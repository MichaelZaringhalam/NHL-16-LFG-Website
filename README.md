# NHL-16-LFG-Website
Website to help NHL 16 players connect in a simple and easy way.
This website was created because there is no way for NHL16 players to get in contact with each other within the game to collaborate and play together. With this website players can easily post their credentials and players can pick and choose who they will play with based on what they are looking for. Players can post if they are looking for a group or if they have a group and are looking for more players. Players psot their Username, skating position, level, gaming system, etc.. and players can choose if the player fits what they are looking for in a teammate.
The website also includes the stats on all the player types within the game. There is an offensive page, a defensive page, and a goalie page.
The registration page adds the new user to the Database and checks to see if the username has already been chosen. Also, the username must have a certain amount of characters. The password must also contain a certain amount of characters. Error checking is used
throughout the forms used in the website.
The login page checks to see if the login credentials are correct or else it will display the appropriate error message.

Website includes PHP files which includes embedded HTML and CSS where needed. Most of the HTML and CSS is included in the HeaderFile.

Each page uses the same outline by including the Header, navbar, and the footer for each page. The difference is the CONTENT that will be displayed on the pages.
The homePageContent includes the forum posts and button leading to the "List My Skater" page. You do not have to sign in or register to write a post. You can submit a post as a guest, but if you do sign in then your post will automatically update itself so you cannot post more than once. Posts are automatically deleted after 4 hours by keeping track of the TimeStamp.

The forum includes the information needed for players to contact each other through the gaming system at which they are using. All of this information is included in the forum SQL table. 

Possible Additions:
Thinking of adding a "Quick Post" option by having the user choose their posting information once and then just clicking a button instead of plugging in all the information again. The quick post info is only an option for registered users and can be easily updated.
Add registration button in login page.
Create Android app so that the website and app contact the same DB
