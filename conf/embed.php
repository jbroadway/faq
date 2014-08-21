; <?php /*

[faq/index]

label = "FAQ List"

links[label] = "Show table of contents links"
links[type] = select
links[callback] = "faq\Faq::yes_no"
links[initial] = "yes"

category[label] = "Category"
category[type] = select
category[callback] = "faq\Category::list_for_embed"

[faq/links]

label = "FAQ Links"

[faq/categories]

label = "FAQ Categories"

; */ ?>