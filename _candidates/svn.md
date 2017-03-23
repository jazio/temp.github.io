# svn
# The Rage of the past.
# v.0.1

Init a repository.
```
svn init
```
or
```
svn up
```
or checkout

```
svn co https://path/to/repo
```
Take the path from repo browser.

svn add *
svn will not add all new files. To avoid this unpleasant fact use --force attribute.
```
svn * --force
```
Commit to server.
Unlike git, svn will commit directly to server
```
svn commit -m "Message about the commit."
```