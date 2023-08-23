# IE4717 Web Appplication Design Project

## Theme 2: A web portal for online purchase of fashion clothes/shoes/bags/watches

## Git Commands

### Navigating around git

Cloning to repository: <br />
git clone https://github.com/keefhub/WebApp-Design.git <br />
Switch to branch : <br />
git checkout &lt;branchname&gt;

### Commiting and Pushing:

:exclamation: make sure that you are in your own branch :exclamation: <br />
checking your branch:<br />
git branch -a<br />
your current working branch will have an asterisk beside

adding changes to your branch:<br />
git add -A<br />
&rsquo;-A&rsquo; command adds all the changes you made.<br />
If you want to add specific file, run this command:<br />
git add &lt;FILENAME.FILETYPE&gt;<br />

commiting changes to your branch:<br />
git commit -m &rsquo;&lt;SOME MESSAGE&gt;&rsquo;<br />

lastly, pushing changes to your branch:<br />
git push origin &lt;YOUR BRANCH NAME&gt;<br />

going to main branch:<br />
git checkout main<br />
git merge &lt;YOUR BRANCH NAME&gt;<br />
git push origin main<br />

before you start coding, always pull any changes from main:

1. switch to your branch
   git checkout &lt;branchname&gt;
2. pull changes
   git pull origin master
