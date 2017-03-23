
Platform installation
------------------------------------------------
Now

A. installing using ./install.sh script:
./install.sh -b trunk -f -v -i multisite_drupal_standard multisite_drupal_ofa5
you can install a specific branch from repository.

Output script in a file
./install.sh mysite  2>&1 | tee log.txt

After patches were applied a file named PATCHES.txt is generated. There are all the patches applied.

B. New model.

phing, phing targets, patches.make



Make files.

Each profile is provided with a build.make which simply points/chain to the main: drupal-org.make. This last make file contains the full stack of maintainable modules.

Patches.
Are provided under each profiles as a make file and a patch folder.


#Folder structure.
------------------------------------------------
