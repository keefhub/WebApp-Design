# IE4717 Web Appplication Design Project

## Theme 2: A web portal for online purchase of fashion clothes/shoes/bags/watches

## Git Commands

### Navigating around git

Cloning to repository:
git clone https://github.com/keefhub/WebApp-Design.git
Switch to branch :
git checkout &lt;branchname&gt;

### Commiting and Pushing:

:exclamation: make sure that you are in your own branch :exclamation:
checking your branch:
git branch -a
your current working branch will have an asterisk beside

adding changes to your branch:
git add -A
&rsquo;-A&rsquo; command adds all the changes you made.
If you want to add specific file, run this command:
git add &lt;FILENAME.FILETYPE&gt;

commiting changes to your branch:
git commit -m &rsquo;&lt;SOME MESSAGE&gt;&rsquo;

lastly, pushing changes to your branch:
git push origin &lt;YOUR BRANCH NAME&gt;

going to main branch:
git checkout main
git merge &lt;YOUR BRANCH NAME&gt;
git push origin main

before you start coding, always pull any changes from main:

1. switch to your branch
   git checkout &lt;branchname&gt;
2. pull changes
   git pull origin master
