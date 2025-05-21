# ChatSite
**A Traditional Messaging Website for People
**

Description:
ChatSite is a web application with traditional chat features for connecting with anyone that uses the app.
A user can register by clicking the "Register" button and sign-in to use ChatSite, which takes them to the main page.
The main(index) page consists of 2 parts. The left side of the page consists of search function to search their contact by entering their username. Additionally, It also contains a text box to type in the message to send.
The right side of the page is where all the messages get displayed.

## Codebase Overview

### Database Schema
# Database Schema Documentation

## Overview

This database stores information about users and their messages. It consists of two tables: `userdetails` and `usermsg`.

## Tables

### `userdetails`

**Purpose:** Stores information about registered users.

| Column Name | Data Type     | Constraints        | Meaning                                  |
|-------------|---------------|--------------------|------------------------------------------|
| ID          | `int(5)`      | `NOT NULL`, `PRIMARY KEY`, `AUTO_INCREMENT` | Unique identifier for each user.         |
| Name        | `varchar(20)` | `NOT NULL`         | Name of the user.                        |
| password    | `varchar(256)`| `NOT NULL`         | Hashed password for the user.            |

### `usermsg`

**Purpose:** Stores messages sent between users.

| Column Name | Data Type | Constraints | Meaning                                                     |
|-------------|-----------|-------------|-------------------------------------------------------------|
| SenderID    | `int(11)` | `NOT NULL`  | ID of the user who sent the message.                         |
| RecvID      | `int(11)` | `NOT NULL`  | ID of the user who received the message.                     |
| Messages    | `text`    | `NOT NULL`  | Content of the message.                                       |

## Relationships

- The `usermsg.RecvID` column is a foreign key that references the `userdetails.ID` column. This means that each message must have a valid recipient who exists in the `userdetails` table.

---
*Generated from `message.sql`*

### Backend PHP Scripts
# PHP Scripts Documentation

This document provides an overview and details of the PHP scripts used in this project.

## File Index

- [`index.php`](#indexphp)
- [`home.php`](#homephp)
- [`registration.php`](#registrationphp)
- [`Reg.php`](#regphp)
- [`Send.php`](#sendphp)
- [`load.php`](#loadphp)
- [`logout.php`](#logoutphp)
- [`getImage.php`](#getimagephp)
- [`DB_Conn.php`](#db_connphp) (File not found)
- [`verify.php`](#verifyphp) (File not found)

---

## `index.php`

**Purpose:**
Serves as the login page for users. It displays a login form and links to the registration page. It can also display error messages passed via GET parameters.

**Key Functionalities:**
- Displays a login form (`username`, `password`).
- Submits login credentials to `verify.php`.
- Provides a link to `registration.php` for new users.
- Displays error messages (e.g., if login fails, if a file upload was too large during registration).
- Includes JavaScript for some dynamic behavior (e.g., `window.history.replaceState` to prevent form resubmission issues, and a script `JavaScript.js` which seems to have a `change()` function called based on a GET parameter `flag`).

**Session Management:**
- Does not appear to initiate sessions directly but is the entry point for users who might not have a session.

**Interaction with other components:**
- **HTML:** Renders the login form.
- **`verify.php`:** Sends POST data containing `username` and `pass` for authentication. (Note: `verify.php` was not found in the provided file list).
- **`registration.php`:** Links to this page.
- **`home.php`:** Links to this page via the logo.
- **`style.css`:** Used for styling.
- **`logo.png`:** Displays the site logo.
- **`JavaScript.js`:** Included for client-side scripting.

**Input Parameters:**
- **GET `error`:** (Optional) A message string to display to the user.
- **GET `flag`:** (Optional) If set to `false`, it triggers a JavaScript function `change()`.

**Output:**
- HTML page with a login form.
- Potentially error messages.

---

## `home.php`

**Purpose:**
The main page for logged-in users. It displays the user's profile picture, username, a form to send messages to other users, and a section to view received and sent messages.

**Key Functionalities:**
- **User Authentication Check:** Verifies if a user session (`$_SESSION['username']`) exists. If not, it redirects to `index.php`.
- **Profile Information Display:** Fetches and displays the user's profile picture and username.
- **Message Sending:** Provides a form to compose and send messages to another user (identified by their name).
- **Message Display:** Dynamically loads and displays messages using `load.php`.
- **Logout:** Provides a button to log out, redirecting to `logout.php`.

**Session Management:**
- **Relies on existing session:** Accesses `$_SESSION['username']` to identify the current user.
- The script starts with `session_start()`.

**Interaction with other components:**
- **`DB_Conn.php`:** Includes this script to establish a database connection. (Note: `DB_Conn.php` was not found).
- **`Send.php`:** Includes this script to handle the message sending logic when the send form is submitted.
- **`load.php`:** Periodically fetches content from this script using jQuery AJAX to update the message display area (`#div_refresh`).
- **`logout.php`:** Links to this script for session termination.
- **`index.php`:** Redirects to this page if the user is not logged in.
- **`style.css`:** Used for styling.
- **`logo.png`:** Displays the site logo.
- **JavaScript/jQuery:** Uses jQuery for AJAX calls to `load.php` for live message updates and `window.history.replaceState`.

**Input Parameters:**
- **POST `Fname`:** (From message sending form) The username of the recipient.
- **POST `msg`:** (From message sending form) The message content.
- **POST `send`:** (From message sending form) Trigger for sending the message.

**Output:**
- HTML page displaying user information, message sending form, and message list.
- Redirects to `index.php` if the session is invalid.

---

## `registration.php`

**Purpose:**
Serves as the user registration page. It displays a form for new users to create an account, including username, password, and profile picture.

**Key Functionalities:**
- Displays a registration form (`username`, `password`, `profilePic`).
- Submits registration data to `Reg.php`.
- Provides a link to `index.php` for users who already have an account.
- Includes basic client-side validation hints (e.g., password pattern).

**Session Management:**
- Does not appear to initiate or manage sessions directly.

**Interaction with other components:**
- **HTML:** Renders the registration form.
- **`Reg.php`:** Sends POST data (including file upload for `profilePic`) for account creation.
- **`index.php`:** Links to this page.
- **`home.php`:** Links to this page via the logo.
- **`style.css`:** Used for styling.
- **`logo.png`:** Displays the site logo.
- **JavaScript:** Uses `window.history.replaceState`.

**Input Parameters:**
- None directly to the page load. Form submits data to `Reg.php`.

**Output:**
- HTML page with a registration form.

---

## `Reg.php`

**Purpose:**
Handles the server-side logic for user registration. It processes the submitted registration form data, validates inputs, handles profile picture uploads, and inserts new user details into the database.

**Key Functionalities:**
- **Database Connection:** Includes `Db_Conn.php` (Note: filename typo, likely means `DB_Conn.php`, which was not found).
- **Input Processing:** Retrieves `username`, `password`, and `profilePic` from `$_POST` and `$_FILES`.
- **Password Hashing:** Hashes the user's password using `password_hash()` with `PASSWORD_BCRYPT`.
- **Profile Picture Upload:**
    - Validates image size and type (allows "jpg", "jpeg", "png").
    - Generates a unique name for the uploaded image.
    - Moves the uploaded file to the `uploads/` directory.
- **Username Uniqueness Check:** Queries the database to ensure the chosen username is not already taken.
- **Database Insertion:** If validation passes and username is unique, inserts the new user's details (name, hashed password, profile picture filename) into the `userdetails` table.
- **Redirection & Feedback:** Redirects back to `index.php` with success or error messages (via GET parameters or by echoing messages before refresh).

**Session Management:**
- Does not appear to initiate or manage sessions directly.

**Interaction with other components:**
- **`Db_Conn.php` (likely `DB_Conn.php`):** Includes for database operations. (Note: `DB_Conn.php` not found).
- **`registration.php`:** Receives form data from this script.
- **`index.php`:** Redirects to this page after processing, potentially with error messages (`$_GET['error']`) or success messages (echoed directly, then refresh).
- **File System:** Saves uploaded profile pictures to the `uploads/` directory.

**Input Parameters:**
- **`$_POST['username']`:** The desired username.
- **`$_POST['pass']`:** The user's password.
- **`$_FILES['profilePic']`:** The uploaded profile picture file.
    - `['name']`: Original filename.
    - `['size']`: File size.
    - `['tmp_name']`: Temporary server path.
    - `['error']`: Upload error code.

**Output:**
- **Redirection:** Typically redirects to `index.php`.
- **Error/Success Messages:**
    - Echoes messages like "Already Registered using this username..", "Not inserted !!!", "Inserted correctly !!! hurray" before a `Refresh` header.
    - Can redirect to `index.php?error=[message]` for file upload errors (size, type, unknown error).

---

## `Send.php`

**Purpose:**
Handles the server-side logic for sending a message from one user to another. It validates the recipient, filters the message for bad words, and inserts the message into the database.

**Key Functionalities:**
- **Input Processing:** Retrieves recipient's name (`$_POST['Fname']`) and message content (`$_POST['msg']`).
- **Session Usage:** Gets the sender's username from `$_SESSION['username']`.
- **Bad Word Filtering:** Includes `bad_Words_list.php` (not provided) and uses `str_ireplace` to replace words from this list with asterisks.
- **User ID Retrieval:** Fetches the sender's and receiver's IDs from the `userdetails` table based on their usernames.
- **Message Validation:** Checks if the message content is not empty.
- **Recipient Validation:** Checks if the recipient user exists in the database.
- **Database Insertion:** Inserts the message (SenderID, RecvID, Messages) into the `usermsg` table.
- **Feedback:** Echoes messages like "not inserted !!", "Friend details not found !!", or "Message cant be empty!".

**Session Management:**
- Accesses `$_SESSION['username']` to identify the sender. It does not start the session itself but assumes `home.php` (which includes it) has already started it.

**Interaction with other components:**
- **`DB_Conn.php`:** Assumed to be included by `home.php` for database operations. (Note: `DB_Conn.php` not found).
- **`bad_Words_list.php`:** Includes this file to get a list of profane words for filtering. (Note: `bad_Words_list.php` not found).
- **`home.php`:** This script is included within `home.php` when the send message form is submitted.
- **Database (`userdetails`, `usermsg` tables):** Reads user IDs and inserts new messages.

**Input Parameters:**
- **`$_POST['Fname']`:** The username of the recipient.
- **`$_POST['msg']`:** The content of the message.
- **`$_SESSION['username']`:** (Implicit) The username of the sender.

**Output:**
- Echoes status messages directly to the output (which would be part of the `home.php` page).
    - "not inserted !!"
    - "Friend details not found !!"
    - "Message cant be empty!"

---

## `load.php`

**Purpose:**
Fetches and formats messages for the current logged-in user. This script is designed to be called via AJAX (as seen in `home.php`) to dynamically update the message display area.

**Key Functionalities:**
- **Database Connection:** Includes `DB_Conn.php`. (Note: `DB_Conn.php` not found).
- **Session Usage:** Starts the session (`session_start()`) and retrieves the current user's username from `$_SESSION['username']`.
- **User ID Retrieval:** Fetches the current user's ID from `userdetails` based on their username.
- **Message Retrieval:** Fetches all messages from `usermsg` where the current user is either the sender or the receiver.
- **Sender/Receiver Name Lookup:** For each message, it queries `userdetails` to get the names of the sender and receiver.
- **HTML Formatting:** Generates HTML to display the messages, differentiating between sent and received messages by applying different CSS classes (`inner-container1` for received, `inner-container2` for sent/reply). It also adds an `onclick` JavaScript call `Copy(count)` to each message block.

**Session Management:**
- Starts its own session using `session_start()`.
- Accesses `$_SESSION['username']` to identify the current user.

**Interaction with other components:**
- **`DB_Conn.php`:** Includes for database operations. (Note: `DB_Conn.php` not found).
- **`home.php`:** This script's output is loaded into the `#div_refresh` element in `home.php` via an AJAX call.
- **`style.css`:** Includes this stylesheet directly in its output.
- **`JavaScript.js`:** Includes this script directly in its output. The generated HTML also calls a `Copy()` function from this script.
- **Database (`userdetails`, `usermsg` tables):** Reads user information and messages.

**Input Parameters:**
- **`$_SESSION['username']`:** (Implicit) The username of the user whose messages are to be loaded.

**Output:**
- HTML content representing the list of messages for the user.
- Includes `<link>` and `<script>` tags for `style.css` and `JavaScript.js`.
- If no messages, outputs "You have no messages !!".

---

## `logout.php`

**Purpose:**
Terminates the current user's session, effectively logging them out.

**Key Functionalities:**
- **Session Destruction:**
    - Starts the session (`session_start()`).
    - Unsets all session variables (`unset($_SESSION)`).
    - Destroys the session (`session_destroy()`).
    - Closes the session write (`session_write_close()`).
- **Redirection:** Redirects the user to `index.php` after destroying the session.

**Session Management:**
- Explicitly manages session termination.

**Interaction with other components:**
- **`index.php`:** Redirects the user to this page.
- **Any page with a logout button/link:** This script is the target for logout actions (e.g., `home.php`).

**Input Parameters:**
- None.

**Output:**
- **HTTP Headers:** Primarily sends a `Location` header to redirect to `index.php`.

---

## `getImage.php`

**Purpose:**
Retrieves and outputs the profile picture image data for a given username. This allows embedding user profile pictures directly, for example, in `<img>` tags.

**Key Functionalities:**
- **Database Connection:** Includes `DB_Conn.php`. (Note: `DB_Conn.php` not found).
- **Input Processing:** Gets the `username` from a GET parameter (`$_GET['username']`).
- **Image Data Retrieval:** Fetches the `profilePic` (which seems to store the image data directly or a path, but the `header("Content-type:image/jpeg")` and `echo $row['profilePic']` suggest it might be storing binary data or a filename that is then read from `uploads/` - the `home.php` usage `src="uploads/<?=$image['profilePic'] ?>"` suggests it's a filename. However, this script outputs the data directly. This is a point of ambiguity/potential issue if `profilePic` stores only the filename and not the binary data).
    *Correction based on `Reg.php` and `home.php` usage:* `userdetails.profilePic` stores the *filename* of the image (e.g., `IMG-something.jpg`), and the images are stored in the `uploads/` directory. `getImage.php` would need to construct the full path to the image file, read its content, and then output it with the correct content type. The current implementation `echo $row['profilePic']` would just output the filename string, not the image binary, unless `profilePic` actually stores the binary data. Given the context of `Reg.php` saving files and `home.php` constructing paths, it's more likely `profilePic` is a filename. This script, as written, would not correctly display the image if `profilePic` is just a filename. It should read the file content.

**Session Management:**
- Does not appear to use sessions.

**Interaction with other components:**
- **`DB_Conn.php`:** Includes for database operations. (Note: `DB_Conn.php` not found).
- **Database (`userdetails` table):** Reads the `profilePic` field.
- **Frontend:** Intended to be used as a source for image tags (e.g., `<img src="getImage.php?username=testuser">`). However, `home.php` constructs image paths like `uploads/FILENAME` directly. This script might be an alternative or unused way to get images.

**Input Parameters:**
- **`$_GET['username']`:** The username for whom to retrieve the profile picture.

**Output:**
- **HTTP Headers:** Sets `Content-type: image/jpeg`.
- **Image Data:** Echoes the value of the `profilePic` field from the database. (This is problematic if it's just a filename, as explained above).

---

## `DB_Conn.php`

**Status: File Not Found**

**Assumed Purpose:**
This script would typically be responsible for establishing a connection to the MySQL database. It would likely contain:
- Database credentials (host, username, password, database name).
- `mysqli_connect()` or PDO connection logic.
- Error handling for connection failures.
- It would make the database connection object (e.g., `$conn`) available to other scripts that include it.

---

## `verify.php`

**Status: File Not Found**

**Assumed Purpose:**
This script would handle the user login verification process. It would likely:
- Receive `username` and `password` via POST from `index.php`.
- Connect to the database (possibly by including `DB_Conn.php`).
- Query the `userdetails` table for the given username.
- Compare the submitted password with the stored hashed password (using `password_verify()`).
- If credentials are valid:
    - Start a session.
    - Store user information (e.g., username, user ID) in `$_SESSION`.
    - Redirect to `home.php`.
- If credentials are invalid:
    - Redirect back to `index.php` with an error message (e.g., `index.php?error=InvalidCredentials`).

### Frontend JavaScript (JavaScript.js)
# JavaScript.js Documentation

## Overall Purpose

The `JavaScript.js` file provides client-side interactivity for the web application, primarily focusing on enhancing user experience in the chat and login functionalities. It manipulates DOM elements to pre-fill form fields based on user actions and to visually indicate errors on the login page.

---

## Functions

### 1. `Copy(c)`

**Purpose:**
The `Copy` function is designed to extract a username from a displayed message and populate the "Friends ID" input field in the message composition form. This simplifies the process of replying to a message or starting a new message with a user from the message history.

**DOM Manipulation:**
- **Reads:** It reads the `innerHTML` of an element with the class `msg` at a specific index `c`. These elements, as seen in `load.php`, contain text like "Reply to [Username]" or "From [Username]".
- **Writes:** It sets the `value` of an input field with the ID `Fname`. This input field is used in `home.php` for specifying the recipient of a message.

**Events Handled:**
- This function is intended to be called by an `onclick` event attached to message display elements, as generated by `load.php`. For example: `<div class="inner-container2" onclick='Copy(0)'>...</div>`.

**Interaction with Backend Scripts:**
- This function does not directly interact with backend scripts. It prepares data on the client-side for a potential form submission that will then be handled by backend PHP scripts (specifically, `Send.php` via `home.php`).

**Logic:**
1. Takes an index `c` as an argument.
2. Retrieves the HTML content of the `c`-th element with the class name `msg`.
3. Checks if the content includes "Reply to " or "From ".
4. If either substring is found, it removes that prefix to isolate the username.
   - `a.substr(9)` is used for "Reply to " (length 9).
   - `a.substr(5)` is used for "From " (length 5).
5. Sets the value of the input field with `id="Fname"` to the extracted username.

---

### 2. `change()`

**Purpose:**
The `change` function is used to visually highlight the username and password input fields on the login page (`index.php`), typically to indicate an error with the previously submitted login credentials.

**DOM Manipulation:**
- **Selects:** It selects input elements by their `name` attribute:
    - `document.getElementsByName("username")`
    - `document.getElementsByName("pass")`
- **Modifies Style:** It changes the `background-color` style of these input fields to `rgb(212, 83, 78)` (a reddish color), signaling an error or incorrect input.

**Events Handled:**
- This function is not directly an event handler itself. It is called from a `<script>` block within `index.php` when a specific GET parameter (`flag=false`) is present in the URL:
  ```php
  if (isset($_GET['flag'])) {
    if ($_GET['flag'] == false) {
      echo '<script src = "JavaScript.js">
            </script>
            <script>
            change();
            </script>
            ';
    }
  }
  ```

**Interaction with Backend Scripts:**
- This function does not directly interact with backend scripts. Its execution is triggered by server-side logic in `index.php` (based on URL parameters), which in turn might be set by other backend scripts (e.g., a hypothetical `verify.php` redirecting back to `index.php` with `flag=false` on login failure).

**Logic:**
1. Selects the first input element with the name "username".
2. Sets its background color to red (`rgb(212, 83, 78)`).
3. Selects the first input element with the name "pass".
4. Sets its background color to red (`rgb(212, 83, 78)`).

---

### CSS Styling (style.css)
# CSS Styling Documentation (`style.css`)

## Overall Styling Approach

The `style.css` file defines the visual appearance of the chat application. The overall approach is:

- **Layout:** The application primarily uses a combination of flexbox (`display: flex`) for component alignment (e.g., in headers, status bars) and absolute positioning for major layout sections like the message area and the message input form.
- **Color Scheme:**
    - A primary color `var(--color1: #115bd8)` (blue) is defined and used for interactive elements like submit buttons.
    - Backgrounds generally use shades of gray (e.g., `#9e9b9b`, `#dad9d9`, `#5b5d61`, `#15191C`, `#2d3740`).
    - Text color is often white, especially on darker backgrounds.
    - Input fields have a dark background with white text.
- **Typography:**
    - Imports "FontAwesome" for icons.
    - Sets a global font `Open Sans Condensed` with a default size of `30px` and `letter-spacing: 1px` for the body, though specific elements often override the font size (e.g., inputs are `14px`).
- **General Elements:**
    - Inputs, textareas, and buttons have a consistent padding, margin, and rounded corners (`border-radius: 25px`). They also share a transition effect.
    - Focus state for inputs and textareas is highlighted with a blue border (`border: 1px solid var(--color1)`).
- **Visual Cues:** Rounded corners are extensively used for containers, buttons, and input fields, giving a modern, soft look. Shadow effects (`box-shadow`) are used on some containers like `.everything` to give them depth.

No explicit responsive design media queries are apparent in this file, suggesting the layout might be fixed-width or rely on percentage-based widths for some responsiveness.

---

## Key CSS Classes and Selectors

### General Page & Font
- **`@import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";`**
    - Imports the FontAwesome library, allowing the use of its icons (e.g., the search icon `fas fa-search` hinted at in `home.php`'s HTML comments, though not explicitly used in the provided CSS for `<i>` tags).
- **`:root`**
    - Defines a CSS variable `--color1` set to `#115bd8` (blue), used for button backgrounds.
- **`body`**
    - `letter-spacing: 1px;`
    - `font-family: 'Open Sans Condensed', sans-serif;`
    - `font-size: 30px;` (This is quite large for a base font size and is likely overridden by more specific selectors for most text content).

### Common Elements Styling
- **`input, textarea, button`**
    - Consistent padding, margin, `box-sizing`.
    - `border: 0px solid black;` (effectively no border by default).
    - `transition: 0.4s;` (for smooth hover/focus effects).
    - `outline: none;`
    - `width: 250px;` (default width).
    - `font-size: 14px;`
    - `border-radius: 25px;` (rounded corners).
- **`input:focus, textarea:focus`**
    - `border: 1px solid var(--color1);` (blue border on focus).
- **`i` (Icon styling)**
    - `position: absolute;`
    - `margin-left: -27px; margin-top: 23px;` (positions icons, likely intended to be inside an input field).
- **`button[type="submit"]`**
    - `color: white; background-color: var(--color1);` (blue background, white text).
    - `width: 120px; font-weight: bold;`
- **`button:hover`**
    - `font-size: 16px; letter-spacing: 1px;` (slight zoom and spacing effect on hover).
- **`label`**
    - `font-size: 20px; font-weight: bold; color: white;`
- **`a` (Anchor tags)**
    - `text-decoration: none; color: white;`
- **`ul` (Unordered lists)**
    - `list-style-type: none; margin: 0; padding: 0;` (removes default list styling).

### Layout and Container Specifics

- **`.header`** (Used in `home.php`)
    - `padding: 10px;`
    - `background-color: #dad9d9;` (light gray).
    - `border-radius: 20px;`
    - `height: auto;`
- **`.header ul`**
    - `display: flex; justify-content: space-between;` (arranges items like logo and logout button).

- **`.everything`** (Used in `index.php` and `registration.php` for login/register forms)
    - `background-color: #9e9b9b;` (medium gray).
    - `box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;` (prominent shadow for depth).
    - `padding: 40px; border-radius: 25px;`
    - `background-image: linear-gradient(to left, #c9c4c4 ,#8b8888);` (gray gradient).
    - `opacity: 0.8;` (slight transparency).
    - `width: auto; height: auto;`

- **`.status`** (Used in `home.php` for user profile pic and name)
    - `background-color: white;`
    - `height: 70px;`
    - `border-radius: 20px 20px 0px 0px;` (rounded top corners).
    - `padding: 10px; display: flex; justify-content: left;` (aligns profile pic and name).
- **`.status li`**
    - `padding-right: 20px;` (spacing between status items).

- **`.left`** (Container in `home.php` for status and message sending form)
    - `position: absolute; top: 20%;`
    - `background-color: #5b5d61;` (darker gray).
    - `border-radius: 20px;`
    - `height: 460px;`

- **`.inner_form`** (Padding for the form within `.left` in `home.php`)
    - `padding: 15px;`

- **`.logoutButton`** (In `home.php`)
    - `color: white; background-color: black;`
    - `border: 2px solid; border-radius: 10px;`
    - `width: 130px; height: 50px;`
- **`.logoutButton:hover`**
    - `letter-spacing: 1px;`

- **`.message`** (The main chat message display area in `home.php`, populated by `load.php`)
    - `position: absolute; width: 47%; height: 395px; top: 20%; left: 50%;` (positions it to the right of `.left`).
    - `padding-bottom: 50px; padding-left: 20px; padding-top: 10px;`
    - `border: 3px solid black; border-radius: 20px;`
    - `font-size: 14px;`
    - `background-color: #15191C;` (very dark background).
    - `overflow-y: scroll;` (enables vertical scrolling for messages).

- **`.inner-container1`** (Styles messages received by the user, in `load.php`)
    - `background-color: rgb(182, 182, 162);` (light grayish-brown, overrides the common style below).
    - `border-radius: 0px 20px 20px 20px;` (specific rounding for received messages).
    - `margin-left: 5px;` (slight left margin).

- **`.inner-container2`** (Styles messages sent by the user, in `load.php`)
    - `margin-left: 350px;` (pushes sent messages to the right, creating an alignment difference).
    - `border-radius: 20px 0px 20px 20px;` (specific rounding for sent messages).

- **`.inner-container1, .inner-container2`** (Common styling for both sent and received message bubbles)
    - `background-color: #2d3740;` (dark gray/blue, this is the actual background for messages unless overridden like in `.inner-container1`).
    - `display: inline-block;`
    - `width: fit-content; max-width: 170px;` (allows messages to be only as wide as their content, up to a max).
    - `word-wrap: break-word;` (breaks long words to prevent overflow).
    - `height: auto; padding: 10px; color: white; cursor: pointer;`

- **`.message::-webkit-scrollbar`** (Styling for webkit scrollbars in the message area)
    - `width: 5px;`
- **`.message::-webkit-scrollbar-track`**
    - `background-color: #2d3740;`
- **`.message::-webkit-scrollbar-thumb`**
    - `background: white; border-radius: 10px; height: 5px;`

### Form Specifics (within `.left` on `home.php`)

- **`#Fname::placeholder, #msg::placeholder`**
    - `color: white;` (placeholder text for message recipient and content is white).
- **`.Center`** (Utility class used in `index.php` and `registration.php`)
    - `display: flex; justify-content: center;` (centers content).
- **`.temp`** (Class for input fields `Fname` and `msg` in `home.php`)
    - `border-radius: 25px;`
    - `width: 350px;`
    - `background-color: rgb(0, 0, 0);` (black background).
    - `color: white;` (white text).
- **`.buttonSend`** (Send button in `home.php`)
    - `border-radius: 25px;`
    - `width: 150px; height: 40px;`
    - `font-weight: bold;`

---

## Responsive Design Considerations

As mentioned, there are no explicit `@media` queries in the `style.css` file. The layout relies on:
- **Absolute Positioning:** For major sections like `.left` and `.message`. This can lead to overlapping or unviewable content on screens that are smaller than the fixed pixel values used for `top`, `left`, and `width`.
- **Fixed Widths/Heights:** Many elements have fixed pixel widths or heights (e.g., `.left`, `.message`, `.temp` inputs).
- **Percentage Width:** The `.message` container has `width: 47%`, which provides some level of responsiveness relative to its parent (the body or a positioned ancestor).

The application would likely not be very responsive on smaller screens or when the browser window is significantly resized. Elements might not reflow correctly, and some content could become inaccessible. To make it responsive, media queries would be needed to adjust positioning, widths, font sizes, and potentially hide/rearrange elements for different screen sizes.
