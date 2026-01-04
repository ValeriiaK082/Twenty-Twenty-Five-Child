# Child Theme - Custom Development

This project is a **WordPress child theme** extended with a modern front-end workflow and a custom Gutenberg block.

---

## Technologies Used

- **Gulp** - task runner for asset management
- **Bootstrap** - responsive UI framework
- **Sass (SCSS)** - styling
- **Webpack / @wordpress/scripts** - Gutenberg block development
- **npm** - dependency management

---

## Gulp Workflow

Gulp is used to manage front-end assets, including:

- Compiling SCSS to CSS
- Bundling JavaScript files
- Watching files for changes during development

### Run Gulp Watch

```bash
gulp watch
```

### FAQ Accordion Block – Build & Development

Gutenberg blocks in this theme are compiled using `@wordpress/scripts` and a block name passed via the `BLOCK` environment variable.

### Available npm Scripts

```json
"scripts": {
  "build": "wp-scripts build blocks/$BLOCK/index.js --output-path=blocks/$BLOCK/build",
  "start": "wp-scripts start blocks/$BLOCK/index.js --output-path=blocks/$BLOCK/build"
}
```

## Example: Start FAQ Accordion Block

To start development mode for the FAQ Accordion block, run:

```bash
BLOCK=faq-accordion npm run start
```
