# advanced-search-plugin
This is a Plugin that works as an advanced search tool for API Algolia.  #Algolia

https://dashboard.algolia.com/users/sign_up Get a new unique id
You can generate new creds here https://dashboard.algolia.com/apps/

When the plugin is activated inside the admin panel you can put your CREDS and CHECK Status Connection, all green all good.


What is done:
We created the plugin structure: Initialization, autoloading of classes, activation/deactivation processing.
Set up a connection with Algolia: Checking the connection and displaying the results in the admin panel.
Added a search form on the client side: Implemented a shortcode, an AJAX handler and display of search results.
Added WP Nonce protection: Increased security when processing forms and requests.

What can you do next:
Data indexing:

Implement functions for automatic indexing of WordPress content in Algolia.
Add the ability to manually index through the admin panel.
Additional settings:

Expand the admin panel settings to manage indexes.
Add the ability to manage API keys and Algolia parameters.
Optimization and refactoring:

Check and optimize existing code.
Add documentation for developers and users.
