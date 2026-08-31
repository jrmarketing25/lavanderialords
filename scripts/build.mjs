import { cp, mkdir, rm, writeFile } from "node:fs/promises";
import { fileURLToPath } from "node:url";
import path from "node:path";

const root = path.resolve(path.dirname(fileURLToPath(import.meta.url)), "..");
const output = path.join(root, "dist");

await rm(output, { recursive: true, force: true });
await mkdir(path.join(output, "client"), { recursive: true });
await mkdir(path.join(output, "server"), { recursive: true });

const response = await fetch("http://localhost:8000/");
if (!response.ok) throw new Error(`Falha ao renderizar a página: ${response.status}`);

let html = await response.text();
html = html.replaceAll('href="index.php"', 'href="/"');
await writeFile(path.join(output, "client", "index.html"), html, "utf8");
await cp(path.join(root, "assets"), path.join(output, "client", "assets"), { recursive: true });

const worker = `export default {
  async fetch(request, env) {
    const url = new URL(request.url);
    if (url.pathname === "/index.php") url.pathname = "/";
    const response = await env.ASSETS.fetch(new Request(url, request));
    if (response.status !== 404) return response;
    url.pathname = "/";
    return env.ASSETS.fetch(new Request(url, request));
  }
};\n`;

await writeFile(path.join(output, "server", "index.js"), worker, "utf8");
