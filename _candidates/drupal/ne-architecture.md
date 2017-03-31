
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



Platform-dev
I should not have merge capabilities at all.
Cycles: All sites are equal important.

Semantic versioning adopted: MAJOR.MINOR.PATCH
MAJOR = API Changes, heavy database queries
MINOR Functionality backing compatibility
PATCH = Bug fixing

There will be multiple minor updates QA-ed by the review team. Qa-team will reject all MAJOR releases. Drop anything with great impact. They will be included on 3 month cycle of MAJOR releases.

Less tags will be used and will use release branches instead.

Split platform code based: Some components like Newsroom, Forum will be kept in separate repositories.

Adopting Visual Regression based on automated testing on acceptance servers. They will be based on relevant URL sets proposed by the contractors. The acceptance will precede QA and playground staging.

Long term
Profiles policy will be replace with repository policy. There are sites that copy platform features from other profiles in there site folder to have them available. Sometimes they fork them. This policy will help them by removing duplicate code.

Permissions to UI will be revoked.

Adopting phing for deployment.

Cookies
User consent is not needed for session cookies (i.e. deleted after the browser is closed), including for authentication or user‑interface customisation.  User consent is required for persistent cookies (i.e. that remain in the browser, unless explicitly deleted by the user).

The cookie policy is well described here: https://webgate.ec.europa.eu/fpfis/wikis/pages/viewpage.action?spaceKey=webtools&title=Cookie+Consent+Kit+-+Technical+details
If your site uses cookies that require informed consent (all cookies except first-party session cookies and first party persistent cookies with an expiry date that does not exceed 3 weeks)
The cookie are created via this wizard is here: http://webtools.ec.europa.eu/cookie-consent/wizard/index.php



Poetry

P: Requests rejected for Portuguese.
S: Map pt-pt to pt in the site’s form settings.


ECAS
P: ECAS names, emails empty/dummy after user login. 
S: Check phpcas library it is probably obsolete.

Devops
Add fpfis-devops tags in the tickets you assign to them


QA
Deployments
No production deployments Friday

Toran Proxy (created by the creator of composer )i is a packagist proxy to host private packages (custom modules) which are redundant.


It does mainly two things at the moment: it proxies Packagist, GitHub and others to make Composer faster and more reliable, and it allows you to host private packages easily

Toran Proxy, s useful to build an environment where all platform / project modules are available even github/bitbucket/packagist websites are down. Not only that is solving remote downtimes but it speed up the builds.

Sites
Digital Agenda - has production (playground) downgraded to tag .28, be wise.
You can see the platform version by going in the platform root (on mgmt) and run
git log -- profiles/


Common issues

Databases locks - Someone is editing content while you were performing updates.






