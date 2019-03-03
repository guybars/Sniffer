<?php
//Step1
$db = mysqli_connect('####.mysql.database.azure.com','root','password','db_name')
or die('Error connecting to MySQL server.');
 
//Print all data from db
$query = "SELECT * FROM stufftoplot";
mysqli_query($db, $query) or die('Error querying database.');
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
while ($row = mysqli_fetch_array($result)){
	$t = $row['datastamp'] . ' ' . $row['keyword'] . '<br />';
	$k = $row['keyword'];
	$d = $row['datastamp'];
	if (strpos($k, 'jpeg') !== false)
	{
		print "[IMAGE]" ; 
		#prints data and time
		print $d;
		print " ";
		#prints the link and makes it clickable
		print preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Z?-??-?()0-9@:%_+.~#?&;//=]+)!i', '<a 
		href="$1">$1</a>', $k);
		echo "\xA".'<br />'.'<br />';
		
	}
	else
	{
		#checks if 'jpg' exits in path
		if (strpos($k,'jpg') !== false)
		{
			print "[IMAGE]" ; 
		    #prints data and time
		    print $d;
		    print " ";
		    #prints the link and makes it clickable
		    print preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Z?-??-?()0-9@:%_+.~#?&;//=]+)!i', '<a 
		    href="$1">$1</a>', $k);
		    echo "\xA".'<br />'.'<br />';
		}
		else{
			#checks if 'png' exits in path
		    if (strpos($k, 'png') !== false)
		    {
			    print "[IMAGE]" ; 
		        #prints data and time
		        print $d;
	    	    print " ";
		        #prints the link and makes it clickable
	    	    print preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Z?-??-?()0-9@:%_+.~#?&;//=]+)!i', '<a 
     	     	href="$1">$1</a>', $k);
	        	echo "\xA".'<br />'.'<br />';
	    	}
			else
			{
				#checks if 'gif' exits in path
				if (strpos($k, 'gif') !== false)
				{
					print "[GIF]" ; 
	    	        #prints data and time
	    	        print $d;
	        	    print " ";
		            #prints the link and makes it clickable
	        	    print preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Z?-??-?()0-9@:%_+.~#?&;//=]+)!i', '<a 
     	         	href="$1">$1</a>', $k);
	             	echo "\xA".'<br />'.'<br />';
					
				}
				else
				{
					#checks if 'js' exits in path
					if (strpos($k, '.js') !== false)
					{
						print "[JS]" ; 
	    	            #prints data and time
	        	        print $d;
    	        	    print " ";
    		            #prints the link and makes it clickable
    	        	    print preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Z?-??-?()0-9@:%_+.~#?&;//=]+)!i', '<a 
         	         	href="$1">$1</a>', $k);
    	             	echo "\xA".'<br />'.'<br />';
						
					}
					else
					{
						#if none of those, print the link + date and time
						print $t;
						echo "\xA".'<br />';
					}
				}
				
			}
		}
	}
}
//close connection with the db
mysqli_close($db);
?>