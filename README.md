#### PHP Swoole Talk @ PHP London 2019

```bash
docker build -f Dockerfile -t swoole-phplondon .
docker run --rm -p 9501:9501 -v $(pwd):/app -w /app swoole-phplondon server.php
```
