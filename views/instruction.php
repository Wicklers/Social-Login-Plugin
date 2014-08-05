<h1>Instructions</h1>
<div id="content">
	<?php
    if (is_dir(ROOT_DIR . "install")) {
        echo "<div class='warning1'>Installation directory still exists. Please delete it for security purpose.</div>";
    }
	?>
	<p>
		<ul>
			<li>
				Create any button on your any page, give that button a link which on click takes to the page "login.php"
			</li>
			<li>
				Default is "Login using Facebook" (& plugin currently supports only this)
			</li>
			<li>
				For specific use of Social Login give link of the button like : <i>login.php?type=facebook</i> or <i>login.php?type=google</i>
			</li>
			<li>
				For logging out the user, give link : <i>login.php?type=logout</i>
			</li>
			<li>
				<b>Example : </b>
				<br/>
				<blockquote>
					<i> &lt;button&gt;
					&lt;a href='login.php?type=facebook'&gt;Login Using Facebook&lt;/a&gt;
					&lt;/button&gt;</i>
					<br>
					<i> &lt;button&gt;
					&lt;a href='login.php?type=logout'&gt;Logout&lt;/a&gt;
					&lt;/button&gt; </i>
				</blockquote>

			</li>
			<li>
				<i>Saved user's info can be retrieved as below : </i>
			</li>
			<li>
				<pre>&lt;?php require <i>ROOT_DIR</i>."/functions/loggedin.php" 
			             if(loggedIn()){
			                 <i>//user is logged in</i>
			             }
			             else{
			                 <i>//user is not logged in</i>
			             }
			        ?&gt;
			    </pre>
			</li>
			<li>
				<pre>&lt;?php require <i>ROOT_DIR</i>."functions/use_info.php" 
                         echo "Full Name:".full_name();
                         echo "First Name:".first_name();
                         echo "Last Name:".last_name();
                         echo "User Id:".user_id();
                         echo "Profile Picture Link:".profile_pic_link();
                         echo "Gender:".gender();
                         echo "Email:".email();
                         echo "Date of Birth:".dob();
                    ?&gt;
                </pre>
			</li>
		</ul>

	</p>
</div>