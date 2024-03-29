# ROADMAP

## Domain

### Text Normalization

- [x] Text unification (remove images, hyperlinks, non-ASCII chars, control chars etc.)
- [x] Cyrillic letters normalization (replace with latin)
- [x] Breaking text into sentences
- [x] Stemmer (Porter2 algorithm)

### Text Comparison (_tf-idf_)

- [x] Texts comparison (cosine similarity using _tf_ factor)
- [x] Sentences comparison (cosine similarity using _idf_ factor)
- [ ] Handle synonyms and/or hyponyms (https://wordnet.princeton.edu)

### Report

- [ ] Compose report

## Infrastructure

### Distributed Application

- [ ] Supervisor

### Distributed Tracing

- [x] OpenTelemetry
- [x] Jaeger

### File Storage

- [x] min.io (S3 compatible object storage)

### Queue

- [x] RabbitMQ

### Database

- [ ] PostgreSQL
