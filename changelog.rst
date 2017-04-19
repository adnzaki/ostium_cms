##########
Change Log
##########

Version 0.2.2-dev
=================
What's new in this version?
    - Remove option to select author in post editor
    - Automatically select author in post editor by using user data
    - Improve permalink and featured image to have dynamic URL
    - Validate permalink to avoid similarity each other
Notes:
    - It's highly recommended to delete all posts before trying this version

Version 0.2.1-dev
=================
What's new in this version?
    - Fixed bug when loading category in post editor
    - Fixed bug last tag item cannot be inserted to tag list if it does not have comma and space after it
    - Refactoring post model (improve logic)
    - Added login page for security
Notes:
    - Please update your database structure by importing ostium_db.sql included in this repo

Version 0.2.0-dev
=================
What's new in this version?
    - Added support for SEO friendly URL (permalink)
    - Improve post filtering with filter by date and category
    - Allow user to change post status that has been published
    - Added "Search Post" feature
    - Added post visibility (public or private) feature
    - Added support for multiple category
    - Added post tagging feature
    - Added "View Post" button after insert or update a post
    - Improved logic and performance
    - Fixed some bugs
Notes:
    - Please update your database structure by importing ostium_db.sql included in this repo

Version 0.1.1-dev
=================
What's new?
    - Added publish button for draft editing
    - Added Indonesia Date library
    - Fixed some bugs

Version 0.1.0-dev
=================
What's new?
    - Fixed bug: number of post list does not displayed correctly
    - Fixed the total of published post on dashboard page
    - Simplify filter uri(s)
    - Fixed algorithms when displaying post to edit
    - Fixed bug: unable to delete post

Version 0.0.9-dev
=================
New features:
    - Added pagination
    - Added post filtering by all post, published and draft

Improvements:
    - Improve algorithms when displaying post list

Version 0.0.7-dev
=================
New features:
  - Featured image on posting

Improvements:
  - Moved category and author option to right sidebar
  - Improve algorithms
  - Fixed some bugs
  - Update database structure

Bugs known:
  - slimscroll() does not work when resizing the browser

Notes:
  - This version comes with new database structure, so you must overwrite your existing database with the new one.
  - You may see images does not appear when you edit a post, it's because server port you are using is different
