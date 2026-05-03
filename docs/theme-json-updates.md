# Theme.json Updates

Below is a proposed `theme.json` aligned with the Octave design system documented in [`design-system.md`](./design-system.md). Review notes appear underneath the JSON.

```json
{
	"$schema": "https://schemas.wp.org/wp/7.0/theme.json",
	"version": 3,
	"settings": {
		"appearanceTools": true,
		"color": {
			"custom": false,
			"customDuotone": false,
			"customGradient": false,
			"defaultGradients": false,
			"defaultPalette": false,
			"palette": [
				{
					"color": "#f6f3ee",
					"name": "Background",
					"slug": "bg"
				},
				{
					"color": "#efeae2",
					"name": "Background Alt",
					"slug": "bg-alt"
				},
				{
					"color": "#ffffff",
					"name": "Paper",
					"slug": "paper"
				},
				{
					"color": "#15140f",
					"name": "Ink",
					"slug": "ink"
				},
				{
					"color": "#3a382f",
					"name": "Ink 2",
					"slug": "ink-2"
				},
				{
					"color": "#6e6a5e",
					"name": "Ink 3",
					"slug": "ink-3"
				},
				{
					"color": "#7a3b2e",
					"name": "Accent",
					"slug": "accent"
				},
				{
					"color": "#5a2a1f",
					"name": "Accent 2",
					"slug": "accent-2"
				},
				{
					"color": "#2a2017",
					"name": "Espresso",
					"slug": "espresso"
				},
				{
					"color": "#1d1611",
					"name": "Espresso 2",
					"slug": "espresso-2"
				},
				{
					"color": "rgba(21,20,15,0.14)",
					"name": "Rule",
					"slug": "rule"
				},
				{
					"color": "rgba(21,20,15,0.08)",
					"name": "Rule Soft",
					"slug": "rule-soft"
				}
			]
		},
		"layout": {
			"contentSize": "720px",
			"wideSize": "1240px"
		},
		"spacing": {
			"spacingSizes": [
				{
					"name": "2x Small",
					"size": "0.25rem",
					"slug": "10"
				},
				{
					"name": "X Small",
					"size": "0.5rem",
					"slug": "20"
				},
				{
					"name": "Small",
					"size": "1rem",
					"slug": "30"
				},
				{
					"name": "Medium",
					"size": "1.5rem",
					"slug": "40"
				},
				{
					"name": "Large",
					"size": "2rem",
					"slug": "50"
				},
				{
					"name": "X Large",
					"size": "clamp(2rem, 4vw, 3rem)",
					"slug": "60"
				},
				{
					"name": "2x Large",
					"size": "clamp(2.5rem, 5.33vw, 4rem)",
					"slug": "70"
				},
				{
					"name": "3x Large",
					"size": "clamp(3rem, 8vw, 6rem)",
					"slug": "80"
				},
				{
					"name": "4x Large",
					"size": "clamp(4rem, 10.67vw, 8rem)",
					"slug": "90"
				},
				{
					"name": "5x Large",
					"size": "clamp(5rem, 13.33vw, 10rem)",
					"slug": "100"
				}
			]
		},
		"typography": {
			"defaultFontSizes": false,
			"fluid": true,
			"fontFamilies": [
				{
					"fontFace": [
						{
							"fontFamily": "\"Inter Tight\"",
							"fontStyle": "normal",
							"fontWeight": "200",
							"src": [
								"file:./assets/fonts/inter-tight/inter-tight-200-normal.woff2"
							]
						},
						{
							"fontFamily": "\"Inter Tight\"",
							"fontStyle": "normal",
							"fontWeight": "400",
							"src": [
								"file:./assets/fonts/inter-tight/inter-tight-400-normal.woff2"
							]
						},
						{
							"fontFamily": "\"Inter Tight\"",
							"fontStyle": "italic",
							"fontWeight": "200",
							"src": [
								"file:./assets/fonts/inter-tight/inter-tight-200-italic.woff2"
							]
						},
						{
							"fontFamily": "\"Inter Tight\"",
							"fontStyle": "italic",
							"fontWeight": "400",
							"src": [
								"file:./assets/fonts/inter-tight/inter-tight-400-italic.woff2"
							]
						}
					],
					"fontFamily": "\"Inter Tight\", sans-serif",
					"name": "Inter Tight",
					"slug": "inter-tight"
				},
				{
					"fontFace": [
						{
							"fontFamily": "\"Source Serif 4\"",
							"fontStyle": "normal",
							"fontWeight": "300",
							"src": [
								"file:./assets/fonts/source-serif-4/source-serif-4-300-normal.woff2"
							]
						},
						{
							"fontFamily": "\"Source Serif 4\"",
							"fontStyle": "normal",
							"fontWeight": "600",
							"src": [
								"file:./assets/fonts/source-serif-4/source-serif-4-600-normal.woff2"
							]
						},
						{
							"fontFamily": "\"Source Serif 4\"",
							"fontStyle": "italic",
							"fontWeight": "300",
							"src": [
								"file:./assets/fonts/source-serif-4/source-serif-4-300-italic.woff2"
							]
						},
						{
							"fontFamily": "\"Source Serif 4\"",
							"fontStyle": "italic",
							"fontWeight": "600",
							"src": [
								"file:./assets/fonts/source-serif-4/source-serif-4-600-italic.woff2"
							]
						}
					],
					"fontFamily": "\"Source Serif 4\", serif",
					"name": "Source Serif 4",
					"slug": "source-serif-4"
				},
				{
					"fontFace": [
						{
							"fontFamily": "\"JetBrains Mono\"",
							"fontStyle": "normal",
							"fontWeight": "200",
							"src": [
								"file:./assets/fonts/jetbrains-mono/jetbrains-mono-200-normal.woff2"
							]
						}
					],
					"fontFamily": "\"JetBrains Mono\", monospace",
					"name": "JetBrains Mono",
					"slug": "jetbrains-mono"
				}
			],
			"fontSizes": [
				{
					"fluid": {
						"max": "0.8125rem",
						"min": "0.75rem"
					},
					"name": "X Small",
					"size": "0.8125rem",
					"slug": "x-small"
				},
				{
					"fluid": {
						"max": "1rem",
						"min": "0.9375rem"
					},
					"name": "Small",
					"size": "1rem",
					"slug": "small"
				},
				{
					"fluid": {
						"max": "1.1875rem",
						"min": "1.0625rem"
					},
					"name": "Medium",
					"size": "1.1875rem",
					"slug": "medium"
				},
				{
					"fluid": {
						"max": "1.5rem",
						"min": "1.25rem"
					},
					"name": "Large",
					"size": "1.5rem",
					"slug": "large"
				},
				{
					"fluid": {
						"max": "1.9375rem",
						"min": "1.625rem"
					},
					"name": "X Large",
					"size": "1.9375rem",
					"slug": "x-large"
				},
				{
					"fluid": {
						"max": "2.5rem",
						"min": "2rem"
					},
					"name": "2X Large",
					"size": "2.5rem",
					"slug": "2x-large"
				},
				{
					"fluid": {
						"max": "3.25rem",
						"min": "2.5rem"
					},
					"name": "3X Large",
					"size": "3.25rem",
					"slug": "3x-large"
				},
				{
					"fluid": {
						"max": "4.25rem",
						"min": "2.75rem"
					},
					"name": "4X Large",
					"size": "4.25rem",
					"slug": "4x-large"
				},
				{
					"fluid": {
						"max": "5.5rem",
						"min": "3.5rem"
					},
					"name": "5X Large",
					"size": "5.5rem",
					"slug": "5x-large"
				},
				{
					"fluid": {
						"max": "7.5rem",
						"min": "4rem"
					},
					"name": "Hero",
					"size": "7.5rem",
					"slug": "hero"
				}
			]
		},
		"useRootPaddingAwareAlignments": true
	},
	"styles": {
		"blocks": {
			"core/button": {
				"border": {
					"radius": "0px"
				},
				"color": {
					"background": "var(--wp--preset--color--ink)",
					"text": "var(--wp--preset--color--bg)"
				},
				":hover": {
					"color": {
						"background": "var(--wp--preset--color--accent)",
						"text": "var(--wp--preset--color--bg)"
					}
				},
				"elements": {
					"link": {
						"color": {
							"text": "var(--wp--preset--color--bg)"
						}
					}
				},
				"spacing": {
					"padding": {
						"bottom": "var(--wp--preset--spacing--20)",
						"left": "var(--wp--preset--spacing--40)",
						"right": "var(--wp--preset--spacing--40)",
						"top": "var(--wp--preset--spacing--20)"
					}
				},
				"typography": {
					"fontFamily": "var(--wp--preset--font-family--inter-tight)",
					"fontSize": "var(--wp--preset--font-size--small)",
					"fontStyle": "normal",
					"fontWeight": "480",
					"letterSpacing": "-0.005em"
				},
				"variations": {
					"outline": {
						"border": {
							"color": "var(--wp--preset--color--ink)",
							"radius": "0px",
							"style": "solid",
							"width": "1px"
						},
						"color": {
							"background": "transparent",
							"text": "var(--wp--preset--color--ink)"
						},
						":hover": {
							"border": {
								"color": "var(--wp--preset--color--accent)"
							},
							"color": {
								"background": "transparent",
								"text": "var(--wp--preset--color--accent)"
							}
						}
					}
				}
			}
		},
		"color": {
			"background": "var(--wp--preset--color--bg)",
			"text": "var(--wp--preset--color--ink)"
		},
		"elements": {
			"button": {
				"color": {
					"background": "var(--wp--preset--color--ink)",
					"text": "var(--wp--preset--color--bg)"
				}
			},
			"caption": {
				"color": {
					"text": "var(--wp--preset--color--ink-3)"
				},
				"typography": {
					"fontFamily": "var(--wp--preset--font-family--jetbrains-mono)",
					"fontSize": "var(--wp--preset--font-size--x-small)",
					"letterSpacing": "0.08em",
					"textTransform": "uppercase"
				}
			},
			"heading": {
				"color": {
					"text": "var(--wp--preset--color--ink)"
				},
				"typography": {
					"fontFamily": "var(--wp--preset--font-family--inter-tight)",
					"fontStyle": "normal"
				}
			},
			"h1": {
				"typography": {
					"fontWeight": "400",
					"letterSpacing": "-0.035em",
					"lineHeight": "0.98"
				}
			},
			"h2": {
				"typography": {
					"fontWeight": "440",
					"letterSpacing": "-0.025em",
					"lineHeight": "1.05"
				}
			},
			"h3": {
				"typography": {
					"fontWeight": "460",
					"letterSpacing": "-0.02em",
					"lineHeight": "1.1"
				}
			},
			"h4": {
				"typography": {
					"fontWeight": "480",
					"letterSpacing": "-0.015em",
					"lineHeight": "1.15"
				}
			},
			"h5": {
				"typography": {
					"fontWeight": "480",
					"letterSpacing": "-0.01em",
					"lineHeight": "1.2"
				}
			},
			"h6": {
				"typography": {
					"fontWeight": "500",
					"letterSpacing": "0",
					"lineHeight": "1.3"
				}
			},
			"link": {
				"color": {
					"text": "var(--wp--preset--color--ink)"
				},
				"typography": {
					"textDecoration": "underline"
				},
				":hover": {
					"color": {
						"text": "var(--wp--preset--color--accent)"
					}
				}
			}
		},
		"spacing": {
			"blockGap": "0",
			"padding": {
				"bottom": "0",
				"left": "clamp(20px, 4vw, 48px)",
				"right": "clamp(20px, 4vw, 48px)",
				"top": "0"
			}
		},
		"typography": {
			"fontFamily": "var(--wp--preset--font-family--inter-tight)",
			"fontSize": "var(--wp--preset--font-size--small)",
			"fontStyle": "normal",
			"fontWeight": "400",
			"lineHeight": "1.55"
		}
	},
	"templateParts": [
		{
			"area": "header",
			"name": "header"
		},
		{
			"area": "footer",
			"name": "footer"
		}
	]
}
```

---

## Change log

### 1. Color palette — replaced wholesale

**Removed:**

- `neutral-pale` `#f9f7f3`
- `neutral-light` `#efeae2`
- `neutral` `#e0d6c8`
- `grey` `#815e4d`
- `grey-dark` `#3a382f`
- `black` `#1e1b15`
- `accent` `#7a3b2e`
- `white` `#ffffff`
- `black-5` `#1e1b150d`
- `white-65` `#ffffffa6`

**Added (replacement set):**

| Slug | Hex | Why |
|---|---|---|
| `bg` | `#f6f3ee` | Concept's "warm porcelain" base. Slightly warmer than the old `#f9f7f3`. |
| `bg-alt` | `#efeae2` | Same value, renamed from `neutral-light` for semantic clarity. |
| `paper` | `#ffffff` | Pure white for cards/inputs. Renamed from `white`. |
| `ink` | `#15140f` | Concept primary text. Darker and warmer than the old `#1e1b15`. |
| `ink-2` | `#3a382f` | Same value, renamed from `grey-dark`. |
| `ink-3` | `#6e6a5e` | New tertiary text color. Replaces `grey` (`#815e4d`), which was a different hue not in the design system. |
| `accent` | `#7a3b2e` | Same value, renamed from `accent`. |
| `accent-2` | `#5a2a1f` | New deeper accent for hover/pressed states (concept `--oc-accent-2`). |
| `espresso` | `#2a2017` | New warm-dark for inverted bands and code blocks. |
| `espresso-2` | `#1d1611` | New deeper espresso for gradients and inverted hero ends. |
| `rule` | `rgba(21,20,15,0.14)` | New default hairline divider. The whole design uses these in place of borders. |
| `rule-soft` | `rgba(21,20,15,0.08)` | New softer hairline for the most recessive dividers. |

**Why the rename from `custom-*` to semantic slugs:** the `custom-` prefix was a leftover from the previous IDC project. The design system is built around semantic roles (`ink`, `bg`, `accent`) — using those as slugs makes block CSS read like the design tokens (`var(--wp--preset--color--ink)` reads as "ink color") and makes future style variations easier (an alternate variation can swap the value of `accent` without renaming any blocks).

**Why the dropped colors:**

- `black-5` (5% black) and `white-65` (65% white): no concept equivalent. If a pattern needs a translucent overlay later, add it back at that point.
- `neutral` (`#e0d6c8`): the design system uses translucent rules (`rule` / `rule-soft`) as dividers, not a flat tan. The flat color isn't needed.

---

### 2. Layout — content/wide sizes updated

| Setting | Old | New | Why |
|---|---|---|---|
| `contentSize` | `768px` | `720px` | Concept `--wp-content` / `--oc-readw`. Tighter prose measure (~70 characters per line at 19px serif body) reads better for long-form. |
| `wideSize` | `1152px` | `1240px` | Concept `--wp-wide` / `--oc-maxw`. Wider container gives the editorial layouts (asymmetric heroes, three-up grids) more room. |

---

### 3. Spacing scale — realigned to the 8pt grid + extended

The concept defines a 10-step scale on a 4/8 base: **4, 8, 16, 24, 32, 48, 64, 96, 128, 160 px**. The old scale didn't match any of those values cleanly.

**Old scale (8 slugs):**

```
10  0.175rem (~2.8px)
20  0.25rem  (4px)
30  0.5rem   (8px)
40  clamp(0.25rem, 1vw, 0.75rem)    (4–12px)
50  clamp(0.5rem, 2vw, 1.5rem)      (8–24px)
60  clamp(0.75rem, 3vw, 2.25rem)    (12–36px)
70  clamp(1rem, 4vw, 3rem)          (16–48px)
80  clamp(1.5rem, 6vw, 4.5rem)      (24–72px)
```

**New scale (10 slugs):**

```
10  0.25rem                              (4px)    — hairline gap
20  0.5rem                               (8px)    — tight inline
30  1rem                                 (16px)   — default block gap
40  1.5rem                               (24px)   — grid gap, sub-padding
50  2rem                                 (32px)   — card gap
60  clamp(2rem, 4vw, 3rem)               (32–48px)  — gutter, section sub-gap
70  clamp(2.5rem, 5.33vw, 4rem)          (40–64px)  — section vertical (small)
80  clamp(3rem, 8vw, 6rem)               (48–96px)  — section vertical (default)
90  clamp(4rem, 10.67vw, 8rem)           (64–128px) — hero vertical
100 clamp(5rem, 13.33vw, 10rem)          (80–160px) — display vertical
```

**Why static for slugs 10–50:** tight UI gaps (4–32px) are component-internal. Fluid scaling at this size produces sub-pixel changes the eye doesn't pick up, while making the editor inspector harder to reason about. Static values match the 8pt grid exactly.

**Why fluid for slugs 60–100:** large vertical paddings benefit from viewport-responsive scaling. The clamp formulas hit the design system's max value at ~1200px viewport (where 1vw equals the target rem), and reduce by roughly 33–50% on small screens. This preserves the responsive behavior the previous spacing iteration aimed for, while landing on the 8pt grid at desktop sizes.

**Why two new slugs (90, 100):** the design uses 128px and 160px paddings on hero and major section breaks (e.g. the dark editorial pull section). The old scale capped at 72px max, which can't reach those values without inline overrides.

---

### 4. Font sizes — replaced with the modular scale

The design system defines a 10-step modular scale: **13, 16, 19, 24, 31, 40, 52, 68, 88, 120 px**. The old scale topped out at 56px and had two duplicate entries (`heading-x-large` and `heading-hero` were both ~48px, with overlapping fluid values).

**Old scale (12 entries, max 56px, with duplicates and a misconfigured `heading-hero` whose `size: 3rem` was lower than its `fluid.max: 3.25rem`):**

```
x-small         0.8rem    (12.8px)
small           0.9rem    (14.4px)
medium          1rem      (16px)
large           1.125rem  (18px)
x-large         1.25rem   (20px)
2x-large        1.5rem    (24px)
heading-small   1.5rem    (24px)
heading-medium  2rem      (32px)
heading-large   2.5rem    (40px)
heading-x-large 3rem      (48px)
heading-primary 3.5rem    (56px)
heading-hero    3rem      (48–52px) — misconfigured
```

**New scale (10 entries, max 120px):**

```
x-small    0.8125rem (13px)  — captions, fine print
small      1rem      (16px)  — UI body (default)
medium     1.1875rem (19px)  — editorial body
large      1.5rem    (24px)  — h5, large body
x-large    1.9375rem (31px)  — h4, section sub-heads
2x-large   2.5rem    (40px)  — h3
3x-large   3.25rem   (52px)  — h2
4x-large   4.25rem   (68px)  — large h2 / pull
5x-large   5.5rem    (88px)  — hero h1
hero       7.5rem    (120px) — display brand statement
```

**Why this ladder:** matches the concept's `--oc-step--1` through `--oc-step-8` token ladder exactly. Each step is a consistent multiplier (~1.25× golden-ratio-adjacent), giving the strong typographic rhythm the design depends on.

**Why drop the `heading-*` slugs:** the old scale duplicated mid-range sizes under `heading-*` slugs (`heading-small` and `2x-large` were both 24px). With a single clean ladder, headings just reference the same slugs as everything else (h2 = 3x-large, h1 = 5x-large or hero).

**Fluid mins:** each entry has explicit `fluid.min` values that reduce by ~5% (small body) up to ~47% (hero) on narrow viewports. Larger sizes get more aggressive reduction because they need it visually; small sizes barely shrink to keep readability stable.

**Worth knowing about font weights:** the concept uses Inter Tight at weights 380, 400, 440, 460, 480, 500 — values that only render correctly with a variable font. The current `assets/fonts/inter-tight/` ships static `200` and `400` weights only, so non-400 weights will fall back to the nearest static. Switching to variable Inter Tight (single `.woff2` file) would unlock the design's intended weight ramp without bloating the asset payload.

---

### 5. Default body styles — Inter Tight, not Source Serif

| Property | Old | New | Why |
|---|---|---|---|
| `fontFamily` | `source-serif-4` | `inter-tight` | The concept's default global body is Inter Tight. Source Serif is reserved for editorial passages (long-form prose, italic emphasis, drop caps) — applied per-block, not globally. |
| `fontSize` | `medium` (16px in old scale) | `small` (16px in new scale) | Same px target (16px), different slug name in the new ladder. |
| `fontWeight` | `300` | `400` | Inter Tight at 300 is too thin for body. Concept uses regular (400) for body. 300 weight isn't in the loaded font files anyway — it would have fallen back to 200 or 400. |
| `lineHeight` | (unset) | `1.55` | Concept default. Generous leading is part of the editorial mood — the absence of this was making body text sit too tightly. |
| `text` (color) | `ink` (`#1e1b15`) | `ink` (`#15140f`) | Same role, new value because the `ink` slug now points to the concept's deeper warm black. |

---

### 6. Heading styles — Inter Tight + per-level metrics

**Old:** every h1–h6 used Source Serif, weight 600, with no letter-spacing or line-height set. All six were identical except for size (size came from blocks/users, not theme.json).

**New:** per the concept, headings are Inter Tight (sans), with weight that decreases as size increases (lighter for big display text, heavier for small headings). Letter-spacing tightens with size; line-height tightens with size. Color is `ink`.

| Element | Weight | letter-spacing | line-height |
|---|---|---|---|
| `heading` (shared) | — | — | — |
| `h1` | 400 | -0.035em | 0.98 |
| `h2` | 440 | -0.025em | 1.05 |
| `h3` | 460 | -0.02em | 1.1 |
| `h4` | 480 | -0.015em | 1.15 |
| `h5` | 480 | -0.01em | 1.2 |
| `h6` | 500 | 0 | 1.3 |

The shared `heading` element only sets `fontFamily`, `fontStyle`, and `color` — these are identical across levels. Per-level entries override only the things that differ. Same effective output as listing all six fully but easier to maintain.

**Note:** when a heading needs the signature italic-serif word swap (e.g. `Coffee, in measured *tempo.*`), that's done by wrapping the word in `<em>` and applying Source Serif via a block-level style or pattern markup. Not something theme.json can express globally.

---

### 7. Caption element — added typography rules

**Old:** caption color set to `grey-dark`. No font family, size, or transform.

**New:**

```json
"caption": {
  "color": { "text": "var(--wp--preset--color--ink-3)" },
  "typography": {
    "fontFamily": "var(--wp--preset--font-family--jetbrains-mono)",
    "fontSize": "var(--wp--preset--font-size--x-small)",
    "letterSpacing": "0.08em",
    "textTransform": "uppercase"
  }
}
```

**Why:** every figure caption in the design uses the `FIG. 0X — DESCRIPTION` mono uppercase treatment. Setting it on the `caption` element gives this baseline to every `core/image` and `core/embed` caption automatically; patterns that need the full treatment (split layout with location on the right, hairline above) can add the rest.

---

### 8. Link element — ink default, accent on hover

**Old:**

```
default text:  accent
hover text:    accent
```

This made every link terracotta from page load — not the concept's behavior.

**New:**

```
default text:  ink (matches body)
text-decoration: underline
hover text:    accent
```

**Why:** the concept treats inline links as "underlined ink" — visually distinct from body via the underline rather than a color shift. Accent color is reserved for explicit "accent links" applied per-block. Hover swaps to accent across the board.

`text-decoration: underline` substitutes for the design's `border-bottom: 1px solid var(--oc-ink); padding-bottom: 1px` because theme.json supports `textDecoration` but not border on inline elements. Visually almost identical.

---

### 9. core/button block — sharp corners, hover-to-accent, smaller padding, weight 480

**Changes from the old definition:**

| Property | Old | New | Why |
|---|---|---|---|
| `border.radius` | `2px` (all corners) | `0px` | Concept rule: sharp corners. `--oc-radius` is `0px`. |
| `color.background` | `grey-dark` (`#3a382f`) | `ink` (`#15140f`) | Concept primary buttons use `--oc-ink`. The old value was actually `ink-2`. |
| `:hover.color.background` | (none) | `accent` | The signature primary-button behavior in the concept — hover shifts to terracotta. |
| `padding.top/bottom` | `--spacing--40` (~24px in new scale) | `--spacing--20` (8px) | Concept primary md = 12px vertical; 8px is closest preset. Was way too tall before. |
| `padding.left/right` | `--spacing--50` (32px in new scale) | `--spacing--40` (24px) | Concept md = 22px horizontal; 24px is closest preset. |
| `fontWeight` | `400` | `480` | Concept buttons use weight 480 (`Inter Tight Medium`-ish). Will fall back to 400 until variable font is loaded. |
| `letterSpacing` | (unset) | `-0.005em` | Concept value — keeps button text optically aligned with the tighter heading tracking. |
| `fontFamily` | `inter-tight` | `inter-tight` | Unchanged. |
| `fontSize` | `medium` (was 16px) | `small` (16px in new scale) | Same px, slug renamed. |

**Outline variation:** simplified from four-side per-corner border definitions to a single `border` shorthand (color/style/width/radius). Added `:hover` state that shifts both border and text to accent — symmetric with primary's hover behavior.

**Note on `:hover` in theme.json:** `:hover` on `core/button` and on the outline variation is supported by theme.json v3 in current WordPress versions. If a pattern style needs richer interactions (e.g. background and text both animating on a transition), augment with CSS in `assets/css/blocks/core-button.css` (the auto-registered per-block CSS handler is already wired up in `class-enqueues.php`).

---

### 10. Root padding — fluid 20–48px

**Old:**

```json
"padding": {
  "left": "var(--wp--preset--spacing--50)",
  "right": "var(--wp--preset--spacing--50)"
}
```

= 32px static (in the new scale; was an even smaller fluid clamp in the old scale).

**New:**

```json
"padding": {
  "left": "clamp(20px, 4vw, 48px)",
  "right": "clamp(20px, 4vw, 48px)"
}
```

**Why:** the concept's `--oc-gutter` is `48px` desktop, `--oc-gutter-mobile` is `20px`. None of the preset spacing slugs go down to 20px (slug 60 floors at 32px), so this is written inline. The clamp matches the concept's gutter behavior exactly: 20px at narrow viewports, 48px at ≥1200px, smooth in between. With `useRootPaddingAwareAlignments: true`, this padding informs alignfull / alignwide automatically.

`blockGap: "0"` is preserved — concept lets blocks pick their own gaps via spacing presets.

---

### 11. Things deliberately not changed

- **Font face declarations.** The three `fontFamilies` entries are unchanged. Switching Inter Tight to a variable font is recommended (see typography note above) but is a separate decision involving asset replacement.
- **`appearanceTools: true`.** Correct — keeps designers' freedom in the editor.
- **`useRootPaddingAwareAlignments: true`.** Correct.
- **The lockdown booleans** (`custom: false`, `customDuotone: false`, `customGradient: false`, `defaultGradients: false`, `defaultPalette: false`, `defaultFontSizes: false`). All preserved — they enforce the design system's restraint by preventing users from picking arbitrary colors or sizes.
- **`templateParts`** for header and footer.

---

### 12. Things theme.json can't express (need CSS)

These belong in the build pipeline (`src/css/`), not theme.json:

- **`font-feature-settings: "ss01", "cv11", "ss03"`** for Inter Tight stylistic alternates. theme.json typography schema doesn't include this property.
- **Mobile gutter override** at `≤600px` — the inline `clamp(20px, 4vw, 48px)` already handles this gracefully, but if the concept's exact mobile collapse is needed, add a media query.
- **Heading mobile collapse** (e.g. h1 dropping to `clamp(2.25rem, 11vw, 4rem)` at ≤600px). The fluid `fontSize` mins approximate this but don't go as small. Add CSS overrides if needed.
- **Drop cap styling** for long-form articles. Pattern-level concern.
- **`:focus-visible` accent ring** — needs a global CSS rule.
- **Hairline-as-border treatments** (`border-top: 1px solid var(--rule)` on cards, etc.). Pattern/block-style CSS.

---

### 13. Open questions

1. **Schema URL is `wp/7.0`** — current WordPress is 6.7/6.8. Worth verifying this URL resolves; if not, drop to `wp/6.7`.
2. **Slug `100`** — valid in the spec but unusual. If the editor UI looks odd with three-digit slugs, rename to `9xl` / `10xl` or similar.
3. **Style variations roadmap** — this is the *default* variation. When alternate variations are added (`/styles/{name}.json`), they only need to override `settings.color.palette` and possibly `styles.typography` to feel different — the rest of the structure should stay the same. The semantic slugs (`ink`, `accent`, `bg`) make this clean.
