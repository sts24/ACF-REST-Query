# ACF REST Query

This WordPress plugin adds support for the Rest API to query posts by the name of an [Advanced Custom Field](https://www.advancedcustomfields.com/). This will also require the [ACF to Rest API](http://github.com/airesvsg/acf-to-rest-api) plugin to be installed as well in order to get the contents of the ACF fields to show up in the API JSON response.

## Usage

Let's say we have an ACF field set on our posts with a field named "Price" and we want to use the Rest API to call up posts that equal a certain price. This plugin will add support for a search query matching the field's short name of "price". When you are building your query, add the prefix "acf_" to the short name of the field you want to query. For example, our query would look like this:

`https://YOUR-DOMAIN-NAME-HERE/wp-json/wp/v2/posts/?acf_price=50`

This will query posts that have the ACF field of price equal to 50. It will also work for querying custom post types in the API, so this would work as well:

`https://YOUR-DOMAIN-NAME-HERE/wp-json/wp/v2/books/?acf_price=50`

### To-Do List
- Add support for greater than/less than of a field value
- Add pages and other data types that can be queried by the API. (only supports posts and custom post types currently)

### Questions?
- [Email Scott](mailto:hello@smithscott.net)
- [@scottsmith](https://www.twitter.com/scottsmith) on Twitter
- Plugin created by [Scott Smith](https://www.smithscott.net)