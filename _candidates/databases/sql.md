
# A SQL join clause combines records from two or more tables in a database.
# [1] It creates a set that can be saved as a table or used as is.
# A JOIN is a means for combining fields from two tables by using values common to each.
#

/* Go to the sql console*/
drush sql-cli


/* Display the name of all tables*/
show tables;

/* Check table system. */
describe system;
select * from system;
select * from system where name='apachesolr';



 SHOW GLOBAL VARIABLES like 'query%';
 1006  +------------------------------+-----------+
 1007  | Variable_name                | Value     |
 1008  +------------------------------+-----------+
 1009  | query_alloc_block_size       | 2048      |
 1010  | query_cache_limit            | 4194304   |
 1011  | query_cache_min_res_unit     | 1024      |
 1012  | query_cache_size             | 536870912 |
 1013  | query_cache_type             | ON        |
 1014  | query_cache_wlock_invalidate | OFF       |
 1015  | query_prealloc_size          | 8192      |
 1016  +------------------------------+-----------+
