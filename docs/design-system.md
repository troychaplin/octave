# Octave — Design System

This document captures the design system for the **Default** style variation of the Octave WordPress block theme, as authored by Claude Design and stored in `_concepts/`. It is the source of truth for what the theme should ship; the current `theme.json` and template files are still catching up to it.

The concept files live at `wp-content/themes/octave/_concepts/`:

- `tokens.css` — design tokens (colors, type, spacing, layout, breakpoints)
- `octave-blocks.jsx` — shared primitives (Header, Footer, buttons, eyebrows, etc.)
- `octave-heroes.jsx` — three hero variations
- `octave-pages.jsx` — Homepage + TypographySpecimen
- `octave-extras.jsx` — block patterns + core blocks + single blog post
- `octave-full-homepage.jsx` / `-b.jsx` / `-c.jsx` — three full homepage compositions
- `octave-full-pages.jsx` — single post + about/sourcing
- `octave-troy-pages.jsx` / `-b.jsx` — work, readme, contact, releases (Troy's portfolio data)
- `octave-bean-archive.jsx` — single release/product + archive
- `index.html` — design canvas (artboards) loaded via React + Babel
- `homepage*.html`, `archive.html`, `post.html`, `readme-*.html`, `bean.html`, etc. — page-by-page browsable concepts

---

## 1. Design philosophy

> Quiet, precise, intentional, considered, editorial, weightless.

- Swiss design principles. Modern editorial publications. Premium SaaS marketing. Architectural portfolios.
- Generous whitespace; confident restraint.
- Hairline rules in place of borders. **No drop shadows**, no gradients (except subtle photo placeholder swatches), no glassmorphism.
- Sharp corners by default. `--oc-radius: 0px` is the rule; `--oc-radius-sm: 1px` is the only exception.
- Strong typographic hierarchy is the primary design element.
- Motion is quiet — short durations, simple `cubic-bezier(.2,.6,.2,1)` easing.
- The default variation is the **foundation** — other style variations will diverge from these bones.

---

## 2. Color tokens

All from `_concepts/tokens.css`. Hex codes are authoritative.

### Background / surface

| Token | Hex | Role |
|---|---|---|
| `--oc-bg` | `#f6f3ee` | Warm porcelain — primary background |
| `--oc-bg-alt` | `#efeae2` | One shade deeper, used for sections / pull-out bands |
| `--oc-paper` | `#ffffff` | Pure white — cards, inputs, hard breakouts |

### Ink (foreground)

| Token | Hex | Role |
|---|---|---|
| `--oc-ink` | `#15140f` | Off-black, faintly warm — primary text + buttons |
| `--oc-ink-2` | `#3a382f` | Secondary text, body copy on tinted bands |
| `--oc-ink-3` | `#6e6a5e` | Tertiary text, metadata, captions |

### Hairlines

| Token | Value | Role |
|---|---|---|
| `--oc-rule` | `rgba(21,20,15,0.14)` | Default 1px hairline |
| `--oc-rule-soft` | `rgba(21,20,15,0.08)` | Even more recessive divider |

### Accent

| Token | Hex | Role |
|---|---|---|
| `--oc-accent` | `#7a3b2e` | Terracotta — used sparingly. Hovers, callouts, focus ring, accent links, the `//` glyph in the wordmark |
| `--oc-accent-2` | `#5a2a1f` | Pressed / deeper accent |

### Espresso (dark sections)

| Token | Hex | Role |
|---|---|---|
| `--oc-espresso` | `#2a2017` | Warm dark — coffee/espresso, **not** true black. Used for inverted hero strips, dark "uses" sections, code blocks |
| `--oc-espresso-2` | `#1d1611` | Deeper espresso — gradient end, deeper dark backgrounds |

### Current `theme.json` palette vs. concept

The current palette is **misaligned** with the concept. Reconcile:

| Concept token | Current `theme.json` slug | Status |
|---|---|---|
| `--oc-bg` `#f6f3ee` | `custom-neutral-pale` `#f9f7f3` | Close but slightly off |
| `--oc-bg-alt` `#efeae2` | `custom-neutral-light` `#efeae2` | Matches |
| `--oc-paper` `#ffffff` | `custom-white` `#ffffff` | Matches |
| `--oc-ink` `#15140f` | `custom-black` `#1e1b15` | Drift — concept is darker and warmer |
| `--oc-ink-2` `#3a382f` | `custom-grey-dark` `#3a382f` | Matches |
| `--oc-ink-3` `#6e6a5e` | (missing) | Add as `custom-grey` (currently `#815e4d`, wrong) |
| `--oc-rule` `rgba(21,20,15,0.14)` | (missing) | Add. Currently approximated by `custom-neutral` `#e0d6c8` |
| `--oc-accent` `#7a3b2e` | `custom-accent` `#7a3b2e` | Matches |
| `--oc-accent-2` `#5a2a1f` | (missing) | Add for hover/pressed |
| `--oc-espresso` `#2a2017` | (missing) | Add — required for dark bands |
| `--oc-espresso-2` `#1d1611` | (missing) | Add |

`custom-black-5` and `custom-white-65` in the current palette have no concept equivalent — likely safe to drop unless a pattern needs them.

---

## 3. Typography

### Font families

Three families, all already loaded as `@font-face` in `theme.json`:

| Token | Stack | Role |
|---|---|---|
| `--oc-sans` (`inter-tight`) | `"Inter Tight", "Inter", -apple-system, sans-serif` | Display headings, UI, body when not editorial |
| `--oc-serif` (`source-serif-4`) | `"Source Serif 4", "Source Serif Pro", Georgia, serif` | Long-form editorial body, italic emphasis, drop caps |
| `--oc-mono` (`jetbrains-mono`) | `"JetBrains Mono", ui-monospace, monospace` | Eyebrows, metadata, FIG captions, code, tabular labels |

**Note on the default weight:** the concept uses Inter Tight as the body/UI face, with Source Serif 4 reserved for editorial passages and italic emphasis. The current `theme.json` sets the global `styles.typography.fontFamily` to `source-serif-4` — that's wrong relative to the concept. Default body should be `inter-tight`.

### Type scale (`--oc-step-*`)

A modular, golden-ratio-ish scale. Note these are the concept's named tokens; theme.json fontSizes will need to align.

| Token | rem | px | Concept use |
|---|---|---|---|
| `--oc-step--1` | 0.8125 | 13 | Small body, captions |
| `--oc-step-0` | 1 | 16 | Default body / UI |
| `--oc-step-1` | 1.1875 | 19 | Editorial body, larger paragraph |
| `--oc-step-2` | 1.5 | 24 | Card titles, h4 |
| `--oc-step-3` | 1.9375 | 31 | Section subtitle, large pull text |
| `--oc-step-4` | 2.5 | 40 | h3, section heads |
| `--oc-step-5` | 3.25 | 52 | h2 |
| `--oc-step-6` | 4.25 | 68 | Large editorial headline |
| `--oc-step-7` | 5.5 | 88 | Hero h1 |
| `--oc-step-8` | 7.5 | 120 | Display / brand statement |

Inline display sizes used in the concepts go even larger (e.g. 168px on `HeroTypographic`, 92–96px on the asymmetric homepage). For those, use direct `clamp()` values rather than presets — they're one-offs.

### Display heading rules

```css
.oc h1, .oc .oc-display {
  font-family: var(--oc-sans);    /* Inter Tight */
  font-weight: 480;
  letter-spacing: -0.025em;
  line-height: 0.98;
}
```

- Headings are **Inter Tight** (sans), not Source Serif. The current `theme.json` sets all heading elements to Source Serif 4 — that's wrong relative to the concept; only italic emphasis within headings uses serif (`<em>tempo.</em>`).
- Heading weight ranges 380–480 (variable font; never bold).
- Tight tracking on display sizes (`-0.025em` to `-0.04em`).
- Tight leading (`0.93–1.05`) on display.

### Editorial body rules

```css
.oc .oc-editorial {
  font-family: var(--oc-serif);
  font-size: 1.1875rem;   /* 19px */
  line-height: 1.65;
  letter-spacing: 0;
}
```

Used for any prose passage — article bodies, hero subheads, blockquotes, pull text. Italic for emphasis (`<em>specific</em>`).

### Eyebrow / mono metadata

```css
.oc .oc-eyebrow {
  font-family: var(--oc-mono);
  font-size: 11px;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--oc-ink-3);
  font-weight: 500;
}
```

Used **everywhere** as a small caps-style label above a heading or block. Recurring patterns:
- `Eyebrow` above `<h1>`/`<h2>` to identify a section
- `FIG. 01 — JARAMILLO FARM` style figure captions (split left/right with a hairline above)
- `LOT 24·001` style spec metadata (multi-line, `lineHeight: 1.7`)
- Eyebrow strip in headers (e.g. "BUILDING SINCE '07")

### Inline elements

- **Links (default):** ink color, 1px solid underline `paddingBottom: 1`
- **Links (accent):** terracotta color, terracotta underline, used sparingly
- **`<em>`:** italic, often switched to serif inside a sans heading for emphasis (`<em style="font-family: serif">tempo.</em>`)
- **`<strong>`:** for product / proper names
- **`<code>`:** mono, 0.9em, `padding: 1px 6px`, background `var(--oc-bg-alt)`

### Drop cap

Used at the start of long-form articles (`octave-extras.jsx#BlogPost`, `octave-full-pages.jsx#FullSinglePost`):

```css
float: left;
font-family: var(--oc-serif);
font-size: 88px;     /* up to 96px */
line-height: 0.85;
margin-right: 12px;
margin-top: 6px;
font-weight: 400;
```

---

## 4. Spacing

Based on an **8pt grid with a 4px sub-step**. Tokens (`--oc-1` to `--oc-10`):

| Token | px | Common use |
|---|---|---|
| `--oc-1` | 4 | Hairline gaps |
| `--oc-2` | 8 | Tight inline (label/value) |
| `--oc-3` | 16 | Default block gap |
| `--oc-4` | 24 | Grid gap, section sub-padding |
| `--oc-5` | 32 | Card / column gap |
| `--oc-6` | 48 | Outer page gutter (desktop), section gap |
| `--oc-7` | 64 | Section vertical padding (small) |
| `--oc-8` | 96 | Section vertical padding (default) |
| `--oc-9` | 128 | Hero vertical |
| `--oc-10` | 160 | Big hero vertical |

The current `theme.json` `spacingSizes` (slugs 10–80) uses fluid `clamp()` and doesn't map cleanly onto the 8pt grid — the concept assumes static integer values. We'll need to add the integer steps as separate slugs, or replace the existing scale with one that matches the concept's 4/8/16/24/32/48/64/96/128/160 progression while staying fluid where it makes sense (likely the larger vertical paddings).

The on-canvas Design System Sheet (`index.html`) renders the visible spacing strip from `[4, 8, 16, 24, 32, 48, 64, 96, 128]` — confirming these are the canonical steps.

---

## 5. Layout

| Token | Value | Role |
|---|---|---|
| `--wp-content` | `720px` | Prose measure / `contentSize` |
| `--wp-wide` | `1240px` | Outer container / `wideSize` |
| `--oc-maxw` | `1240px` | Same as `--wp-wide` (alias) |
| `--oc-readw` | `720px` | Long-form reading width (alias of `--wp-content`) |
| `--oc-gutter` | `48px` | Outer page gutter, desktop |
| `--oc-gutter-mobile` | `20px` | Outer page gutter, mobile |

Current `theme.json` is `contentSize: 768px` / `wideSize: 1152px`. These should be updated to `720` / `1240` to match the concept.

`useRootPaddingAwareAlignments: true` is correct.

### Breakpoints

```css
--wp-mobile:  600px;   /* <= mobile */
/* tablet:    601–960  */
/* desktop:   961+     */
```

Mobile (`<= 600px`) and tablet (`601–960px`) overrides exist in `tokens.css`:

- Mobile gutter drops from `48px` to `20px`
- `h1` / `oc-display`: `clamp(2.25rem, 11vw, 4rem)` line-height `1`
- `h2`: `clamp(1.75rem, 7vw, 2.5rem)`
- `h3`: `clamp(1.25rem, 5vw, 1.5rem)`
- Editorial body: `1.0625rem` / `lineHeight 1.6`
- Inline grids of >1 column collapse to `1fr`
- Sticky positions become `static`
- Inline padding ≥64px is reduced to `56px` block / `20px` inline

These overrides target inline-styled grids in the React mocks — when ported to the WP theme they need to live as native CSS rules on the actual block selectors and theme.json fluid values.

---

## 6. Misc tokens

| Token | Value | Role |
|---|---|---|
| `--oc-radius` | `0px` | Default radius — sharp corners |
| `--oc-radius-sm` | `1px` | Inputs / very subtle softening |
| `--oc-ease` | `cubic-bezier(.2,.6,.2,1)` | All transitions |
| Focus ring | `outline: 2px solid var(--oc-accent); outline-offset: 2px` | Required on `:focus-visible` |

Font features enabled globally on `.oc`: `"ss01", "cv11", "ss03"` (Inter Tight stylistic alternates).

---

## 7. Primitives & components

### Wordmark / brand block

Used in `Header` and `Footer`. Three parts:

```
//   Troy Chaplin   BUILDING SINCE '07
^    ^              ^
|    |              JetBrains Mono, 10px, ink-3, letter-spacing 0.1em
|    Inter Tight, 500, 20px, letter-spacing -0.02em
JetBrains Mono, 600, 16px, accent color, letter-spacing -0.01em
```

The `//` glyph is treated as a logomark — accent terracotta.

### Header

- Full-bleed group, `border-bottom: 1px solid var(--oc-rule)`, `background: var(--oc-bg)`
- Inner: `max-width: var(--wp-wide)`, `padding: 20px var(--oc-gutter)`
- Three-column grid `auto 1fr auto`: wordmark left, nav center, utilities right
- Nav items: 14px, weight 450, `letter-spacing -0.005em`. Active item gets a 1px ink underline; inactive gets a transparent underline so the layout doesn't shift.
- Default nav: **Writing · Releases · Work · Readme · About**
- Right utilities: "Search", "RSS" (small, ink-2, hidden on tablet via `.oc-header-secondary`), then a primary "Hire me" link styled as a 1px-bordered chip with a small accent dot.
- The current `parts/header.html` does **not** match this. The concept header is significantly different from what's currently built.

### Footer

- Top rule, `padding-top: 80px`
- Inner max-width and gutter as Header
- Four-column grid `2fr 1fr 1fr 1fr`. First column is the brand block + bio paragraph + mono address block. Other three are link columns under eyebrow labels.
- Default columns: **Read** · **Build** · **Site** with link sets sourced from concepts (Writing, Releases, Categories, Tags, Archive · Plugins, Block themes, Build tools, GitHub, NPM · About, Work, Readme, Uses, Contact).
- Bottom row: hairline divider, 24px/32px padding, three-column flex row in mono 11px ink-3, letter-spacing 0.06em. Left: copyright. Center: `WORDPRESS · BLOCK THEME · v1.0 · OTTAWA`. Right: GITHUB · MASTODON · RSS · COLOPHON.

### Buttons

| Variant | Size | Padding | Font size |
|---|---|---|---|
| Primary | sm | `8px 14px` | 12px |
| Primary | md | `12px 22px` | 14px |
| Primary | lg | `16px 28px` | 15px |
| Secondary | sm | `7px 13px` | 12px |
| Secondary | md | `11px 21px` | 14px |
| Secondary | lg | `15px 27px` | 15px |

- Weight `480`, `letter-spacing: -0.005em`.
- Primary: `bg: var(--oc-ink)`, `color: var(--oc-bg)`. **Hover swaps background to `var(--oc-accent)`** with `transition: background .2s var(--oc-ease)`.
- Secondary: transparent bg, ink text, 1px ink border. No hover bg change in the concept (just inherits).
- No border-radius. No shadow.

### LinkArrow (text link with arrow)

Inline-flex, 14px, weight 480, ink color, **1px ink underline**, content `→`, 8px gap. Used in three-up section CTAs.

### Eyebrow

See typography section.

### Hairline (`<hr>` / `<div class="oc-hr">`)

Reset `<hr>` then `height: 1px; background: var(--oc-rule)`. Used as section dividers — never a `<border>`.

### Placeholder (image)

Two modes:

1. **Striped placeholder** (`oc-ph`): 45° repeating-linear-gradient stripes over `--oc-bg-alt`, `1px solid var(--oc-rule-soft)` border, label baked in via `data-label` (mono 10px ink-3, uppercase, `padding: 8px 10px` bottom-left).
2. **Photo swap-in** (`oc-photo[data-tone]`): a flat tinted color block where a real photo would go, plus two soft radial gradients to suggest light and depth. Tones:
   - `cream`: `linear-gradient(180deg, #ebe2d2 → #d4c8b3)`
   - `terracotta`: `#b56b58 → #7a3b2e`
   - `dark`: `#3a2e25 → #1a1410`
   - `green`: `#5e6650 → #3a4031`
   - default (no tone): `#d8cdbe → #b8a994` + radial highlight + accent glow

When real photography ships, the `oc-photo` swatches become the fallback while images load.

### CropCorner

Decorative 10px L-bracket placed at `tl/tr/bl/br` of an artboard. Used sparingly — a Swiss touch. **Optional in production** — likely just for the design canvas.

---

## 8. Page templates needed

The concept implies these WordPress templates / template parts. None are wired up yet beyond the basic index/page templates.

### Templates (top-level)

| Template | Concept source | Notes |
|---|---|---|
| `index.html` | `octave-full-homepage*.jsx` | Three homepage variations to choose from; pick one to ship as default |
| `home.html` (or `front-page.html`) | same | If splitting blog index from homepage |
| `single.html` | `octave-extras.jsx#BlogPost`, `octave-full-pages.jsx#FullSinglePost` | Long-form article with marginalia rails |
| `archive.html` | `octave-bean-archive.jsx#FullArchive` | Sticky sidebar (categories + by year) + numbered essay feed + pagination |
| `page.html` | various | Generic page; likely a reduced version of the article layout |
| `page-about.html` (or `page-{slug}.html`) | `octave-full-pages.jsx#FullSourcingPage` | About page with family/team grid + timeline |
| `page-work.html` | `octave-troy-pages.jsx#WorkPage`, `-b.jsx#WorkPageB` | CV-style: experience, skills, projects |
| `page-readme.html` | `octave-troy-pages.jsx#ReadmePage`, `-b.jsx#ReadmePageB` | Sticky sub-nav: Readme + Uses |
| `page-contact.html` | `octave-troy-pages.jsx#ContactPage` | Form + direct contact info |
| `archive-release.html` (CPT) | `octave-troy-pages.jsx#ReleasesPage` | Releases archive with filter tags |
| `single-release.html` (CPT) | `octave-bean-archive.jsx#FullSingleBean` | Single release/product detail |

The "release" custom post type is implied by the existence of separate releases/single-release concepts. Confirm whether this should be a CPT or just a category of posts.

### Template parts

| Part | Source | Notes |
|---|---|---|
| `header.html` | `octave-blocks.jsx#Header` | Three-column wordmark/nav/utilities. Current `parts/header.html` does not match. |
| `footer.html` | `octave-blocks.jsx#Footer` | Four-column with brand block + 3 link columns + bottom row. Current `parts/footer.html` is a "Proudly Powered" stub. |
| `sidebar-article.html` | post layouts | Filed-under tags, sticky TOC, related release card |
| `sidebar-archive.html` | archive layout | Categories with counts, By year list |
| `sidebar-share.html` | post layouts | Share links |

---

## 9. Block patterns

### From the design canvas (named patterns)

1. **Pattern · Hero / Centered** (`PatternHero`) — eyebrow → display headline (with serif-italic switch on key word) → editorial subhead → primary + secondary buttons. Centered. Hairlines top and bottom of the artboard frame.
2. **Pattern · Feature / Three-up** (`PatternFeatureGrid`) — left h3 + right paragraph (asymmetric intro), then 3 cards each with `NO. 01` (accent mono), `—` (mono), title, body. Top `1px solid var(--oc-ink)` border per card.
3. **Pattern · CTA / Split** (`PatternCTA`) — 1px ink-bordered box, `1.2fr 1fr` grid: left side eyebrow + headline + paragraph + CTA + price stamp; right side photo placeholder (terracotta tone).

### Implied by the page concepts (need to be built)

4. **Numbered essay grid / writing feed** — 5–6 article cards in a row, each with a NO. (mono), date, category eyebrow, title (h3), excerpt, optional read time. Used on FullHomepage and FullArchive.
5. **Hero · Asymmetric editorial** — `7/5` split, headline left + photo with FIG caption right. With or without a meta strip below.
6. **Hero · Index split** — 1fr/1fr: list of items left (numbered table rows), photo right (dark tone with mono caption strip).
7. **Hero · Typographic statement** — display headline at extreme size (120–168px), three-column description+CTA strip below, sub-hero "01–04" index strip with vertical hairlines.
8. **Stats strip** — 4-column row of large 64px numbers + mono caption labels (e.g. "19 / years building", "120 / repositories", "27 / releases").
9. **Three-up section cards** (with vertical dividers) — eyebrow, h3, body, LinkArrow CTA. Used on Homepage subscription/brewing/journal section.
10. **Editorial pull quote section** — `bg-alt` band, full-bleed top/bottom hairlines, oversized italic editorial pull quote (28–32px), small avatar + name/role below.
11. **Wins card** — appended to experience entries; `1px solid var(--oc-ink)` bordered card with `✓` (accent) prefixed bullets.
12. **Stack tags** — small 12px chips with `1px solid var(--oc-rule)` border, mono font, ink-2 color. Used for tech stacks.
13. **Skills grid** — three columns, each with eyebrow header (Backbone / Adjacent / Exploring) and a list of skills with proficiency dots `●` / `◐` / `○`. Legend printed at the bottom.
14. **Filter tag bar** — horizontal row of pill buttons, first one active (ink bg, bg text), rest transparent with hairline border. Used on releases archive.
15. **Pagination** — numbered page list with `…` ellipsis + `←` `→` arrow links. Mono font.
16. **Spec sheet** — two-column grid of label/value pairs under an eyebrow (e.g. "ORIGIN / Inzá, Cauca", "PROCESS / Washed").
17. **Install command block** — dark `var(--oc-espresso)` background, mono 13–14px, `$` prompt, copy-link button on the right.
18. **Color swatch grid** — 4 small color squares for selecting variants, active one outlined.
19. **Changelog entries** — version badge (accent mono), date, then `+` prefixed change notes.
20. **Stats cards** (3-up) — Stars / Active installs / Last release — large number, mono label.
21. **Release / project card** — image placeholder, eyebrow, title (h3), excerpt, "Install path" footer with version + date.
22. **Persona / family card** — photo placeholder + role eyebrow + name + 1–2 sentence description. Used in About / Family section.
23. **Timeline grid** — `120px 1fr 2fr` per row: year (mono accent), title, description. Hairline between rows.
24. **Sticky table of contents** — numbered `01–04` mono prefixes, anchored links to `<h2>`s. Lives in left sidebar of long-form articles.
25. **Sticky section nav** — anchored sub-nav for two-section pages (Readme + Uses). Active state = ink bg, bg-color text.
26. **Drop cap block** — see typography section.
27. **Code block with filename** — light variant uses `bg-alt` + mono; dark variant uses `--oc-espresso`. Optional file-path eyebrow above (`// theme/styles/`).
28. **FIG caption block** — mono 11px caption, two-column flex: left description, right location/coordinate. Above hairline above caption + below hairline below image (figure layout).
29. **Inline figure** — used inside articles. `<figure>` with placeholder + figcaption identical to FIG caption block.
30. **Status / "Now" bar** — sometimes a status bar at the top of homepages with an accent dot and short live-update string.

### Patterns that exist as Gutenberg core blocks (no new build)

- Buttons (Primary / Secondary variants need core/button block style variations)
- Image with caption (core/image — needs the FIG-caption styling)
- Pull quote (core/pullquote — needs the bordered top/bottom variant)
- Code (core/code — needs the dark variant)
- List (core/list — needs the numbered/hairline variant from the typography specimen)

---

## 10. Notable design conventions

These recur across many pages and should be codified as block style variations or pattern slots:

- **`FIG.` numbering on every photo.** Every image is captioned with `FIG. 0X — DESCRIPTION` left, `LOCATION / SPEC` right, separated by a hairline above. This is a strong identity move — preserve it.
- **`NO.` and `01` numbering on every card.** Three-up sections, archive entries, principles — all carry an accent-terracotta mono `NO. 01` (or just `001`) at the top of each item.
- **Eyebrow above every section.** No section starts with a heading alone; there's always a mono uppercase eyebrow first.
- **Italic-serif word inside sans heading.** The most distinctive treatment: a sans display heading with one word swapped to Source Serif 4 italic at a slightly lower weight. Examples: `Coffee, in measured` `tempo.` / `A library of` `specific` `coffees.` Keep this — it's the brand's signature.
- **Top borders, not boxes.** Cards use `border-top: 1px solid var(--oc-ink)` with no other borders — defining the top edge but letting the content fall freely below.
- **Vertical hairlines as column dividers.** Three-up sections often use `border-right: 1px solid var(--oc-rule)` between columns instead of card borders.
- **Mono-font datelines.** Dates and ISBN-like identifiers always use JetBrains Mono with letter-spacing 0.06–0.1em uppercase.
- **Tabular nums on counts.** Pagination, "1 / 4" indicators — always `font-variant-numeric: tabular-nums`.
- **Right-aligned eyebrows in pairs.** When two eyebrows share a row, second is right-aligned (`№14 — Spring Roast` ⟷ `Updated 24 April`).
- **Borders use ink, not rule, when they matter.** `border-bottom: 1px solid var(--oc-ink)` under section headers signals "section start" loudly. Hairlines (`var(--oc-rule)`) are for ambient dividers.

---

## 11. Reconciliation checklist

Things in the concept that the current theme does not yet implement:

### `theme.json`
- [ ] Update palette: `--oc-bg` `#f6f3ee`, `--oc-ink` `#15140f` (current values drift)
- [ ] Add missing tokens: `ink-3` (`#6e6a5e`), `accent-2`, `espresso`, `espresso-2`, `rule`, `rule-soft`
- [ ] Replace `defaultStyles.typography.fontFamily` with `inter-tight` (currently `source-serif-4`)
- [ ] Update heading element font families to `inter-tight` (currently all forced to `source-serif-4`)
- [ ] Update `contentSize` to `720px` (currently `768px`)
- [ ] Update `wideSize` to `1240px` (currently `1152px`)
- [ ] Reconcile `spacingSizes` against the 8pt grid (4/8/16/24/32/48/64/96/128/160)
- [ ] Reconcile `fontSizes` against the modular scale (13/16/19/24/31/40/52/68/88/120)
- [ ] Set root padding to `var(--oc-gutter)` 48px desktop / 20px mobile (currently `var(--wp--preset--spacing--50)`)
- [ ] Add font feature settings `"ss01", "cv11", "ss03"` for Inter Tight
- [ ] Add core block style variations: button (primary/secondary), pullquote, image (FIG caption), code (dark variant)

### Templates / parts
- [ ] Replace `parts/header.html` with the three-column design (wordmark / nav / utilities + Hire me chip)
- [ ] Replace `parts/footer.html` with the four-column design + bottom rule + meta row
- [ ] Build `single.html` with three-column article layout (TOC sidebar + reading column + share rail)
- [ ] Build `archive.html` with sticky filter sidebar + numbered essay feed + pagination
- [ ] Build `page-*.html` templates for About, Work, Readme, Contact
- [ ] Decide on Releases — CPT vs. category — and build matching templates

### Blocks / patterns
- [ ] Build the 30 patterns enumerated in §9 — most are compositions of core blocks with the right styles applied; a few may need custom Gutenberg blocks (sticky TOC, filter tag bar, install command, color swatch picker, stats card, FIG figure)
- [ ] Build pattern category set: hero, feature, cta, archive, post-meta, navigation, callout

### CSS architecture
- [ ] Move concept selectors out of `.oc {}` scope when porting to the theme — they were artboard-scoped to avoid bleeding into the canvas chrome
- [ ] Replace inline-style media-query overrides with proper block selectors
- [ ] Wire up `:focus-visible` accent ring globally
- [ ] Wire up the `cubic-bezier(.2,.6,.2,1)` ease as the default for any `transition` we add

### Asset gaps
- [ ] No real photography exists; the concept uses tinted-gradient swatches as placeholders. Decide whether to ship with image-less patterns + a "Replace with image" prompt, or commission/source default photography.
- [ ] No icon set defined. The concept uses a literal `→` arrow character and the `//` glyph as decorative marks.

---

## 12. Open questions

1. **Mock data source.** The on-canvas designs use a coffee-roaster brand ("Octave Coffee · Bristol"); the full pages use Troy Chaplin's portfolio. Confirm the theme ships generic — or are we building Troy's site directly?
2. **Releases as CPT?** `octave-troy-pages.jsx#ReleasesPage` and `octave-bean-archive.jsx#FullSingleBean` imply a custom post type. If yes, that's plugin territory, not theme.
3. **Style variations.** The concept is the *default* — tagline says "many keys." What are the other style variations going to be? Color shift only, or do they swap fonts and patterns too?
4. **Variable font axes.** Inter Tight and Source Serif 4 are both variable fonts on Google Fonts but ship as static `.woff2` files in `assets/fonts/`. Worth swapping to variable files to enable the 380/440/480 weights the concept uses.
5. **Three homepage variants.** Pick one as default + ship the other two as patterns? Or all three as patterns and a starter content step picks one?

---

## 13. Quick reference — token mapping table

For when porting CSS rules from concepts to the theme:

| `tokens.css` var | `theme.json` preset (target) |
|---|---|
| `var(--oc-bg)` | `var(--wp--preset--color--bg)` *(rename custom-neutral-pale → bg)* |
| `var(--oc-bg-alt)` | `var(--wp--preset--color--bg-alt)` |
| `var(--oc-paper)` | `var(--wp--preset--color--paper)` |
| `var(--oc-ink)` | `var(--wp--preset--color--ink)` |
| `var(--oc-ink-2)` | `var(--wp--preset--color--ink-2)` |
| `var(--oc-ink-3)` | `var(--wp--preset--color--ink-3)` |
| `var(--oc-accent)` | `var(--wp--preset--color--accent)` |
| `var(--oc-accent-2)` | `var(--wp--preset--color--accent-2)` |
| `var(--oc-espresso)` | `var(--wp--preset--color--espresso)` |
| `var(--oc-rule)` | `var(--wp--custom--color--rule)` *(custom property; not a palette swatch)* |
| `var(--oc-sans)` | `var(--wp--preset--font-family--inter-tight)` |
| `var(--oc-serif)` | `var(--wp--preset--font-family--source-serif-4)` |
| `var(--oc-mono)` | `var(--wp--preset--font-family--jetbrains-mono)` |
| `var(--oc-step-N)` | `var(--wp--preset--font-size--{slug})` |
| `var(--oc-N)` | `var(--wp--preset--spacing--{slug})` |
| `var(--wp-content)` | `theme.json settings.layout.contentSize` |
| `var(--wp-wide)` | `theme.json settings.layout.wideSize` |

Renaming the palette slugs to semantic names (`ink`, `bg`, `accent`) instead of `custom-black`, `custom-neutral-pale`, etc., will make the theme far more readable and make porting CSS one-to-one. The current `custom-*` prefix is a leftover convention worth dropping when reconciling.
