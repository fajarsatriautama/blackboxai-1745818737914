import http.server
import socketserver
import os

PORT = 8000

web_dir = os.path.dirname(os.path.abspath(__file__))
os.chdir(web_dir)

Handler = http.server.SimpleHTTPRequestHandler
Handler.extensions_map.update({
    '.php': 'application/x-httpd-php',
    '.css': 'text/css',
    '.js': 'application/javascript',
})

print(f"Starting server at http://localhost:{PORT}")
print(f"Serving directory: {web_dir}")

with socketserver.TCPServer(("", PORT), Handler) as httpd:
    print("Server started. Press Ctrl+C to stop.")
    httpd.serve_forever()
