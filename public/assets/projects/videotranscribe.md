### Application Overview
Automated video/audio transcription and optional summarization for meetings and interviews using Whisper.

### Core Functions & Capabilities
- Processes MP4/MOV videos and WAV/MP3 audio
- Merges multiple audio files based on timestamps
- Whisper speech‑to‑text with configurable model sizes
- Optional summaries (local markdown or GPT‑assisted)
- Extracts timestamps (e.g., DJI filenames) for context
- Batch processing in Docker containers

### Technology Stack
- Python 3.10, Whisper, FFmpeg
- Transformers/Torch for model runtime
- Outputs PDF transcripts and JSON metadata
- Dockerized with env‑based configuration

