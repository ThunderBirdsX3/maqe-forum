## MAQE Homework Challenge - Template and Styling

Time: 40 - 60 minutes recommended.

Recreate the following reference image in HTML and CSS using a templating library.
### Requirements

* You can use any markup, styles and layout method necessary, but you must use these JSON files as your data source:
  * <a herf="https://maqe.github.io/json/authors.json" target="_blank">authors</a>
  * <a herf="https://maqe.github.io/json/posts.json" target="_blank">posts</a>
* You must use a template library. Either a standalone library or one that is a part of a framework.
* Links do not have to function at all. Any links in the image are for display only.
* Don't worry about browser support. If it can run on the latest version of Google Chrome, it's fine.

### Programming Language

If you are applying as a Back End Engineer definitely use a back end language. (MAQE uses PHP and NodeJS primarily, but feel free to use whichever language you're most comfortable with.) Frameworks are OK too.

If you are applying as a Front End Engineer please use Javascript and a JS templating library (like Handlebars.js, etc.) Frameworks are OK too.

If you are applying as a a Fullstack Engineer feel free to do one or both of the above.
MAQE Homework Challenge - Template and Styling

<img src="https://maqe.github.io/img/template-2021.png" alt=""/>

### How to start program

```
composer install \
    && cp .env.example .env \
    && php artisan k:g \
    && touch database/database.sqlite \
    && php artisan migrate --seed \
    && yarn && yarn prod
```

then `php artisan serve`
