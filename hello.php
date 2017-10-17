<?php
/**
 * @package Hello_Hamilton
 * @version 1.0
 */
/*
Plugin Name: Hello Hamilton
Description: This is not just a plugin, it takes and it takes and it takes and we keep living anyway. We rise and we fall and we break and we make our mistakes. When activated you will randomly see a lyric from <cite>Hamilton the Musical</cite> in the upper right of your admin screen on every page.
Author: Peter Wilson
Version: 1.0
Author URI: https://peterwilson.cc/
Text Domain: hello-hamilton
*/

function hello_hamilton_get_lyric() {
	/** These are selected lyrics to Hamilton the Musical */
	$lyrics = "Our man saw his future drip, drippin’ down the drain
My name is Alexander Hamilton
You punched the bursar?
The Lancelot of the revolutionary set!
I am not throwing away my shot
I'm young, scrappy, and hungry
Raise a glass to the four of us
Raise a glass to freedom
Something they can never take away
Look around, look around
The revolution’s happening in New York
They have not your interests at heart
It’s hard to listen to you with a straight face
I will send a fully armed battalion to remind you of my love
Da dada da da. Da dadada dayada. Dada da.
Here comes the General!
Now I’m the model of a modern major general
The venerated Virginian veteran
They delighted and distracted him
Martha Washington named her feral tomcat after him!
Now my life gets better, every letter that you write me
Laughin’ at my sister, cuz she wants to form a harem
Laughin’ at my sister as she’s dazzling the room
Then you walked in and my heart went “Boom!”
He’s penniless, he’s flying by the seat of his pants.
Peach fuzz, and he can’t even grow it!
I'm willing to wait for it.
He takes and he takes and he takes
I have never seen the General so despondent
I shoot back, we have resorted to eating our horses
Five, six, seven, eight, nine…
If they don’t reach a peace, that’s alright
Time to get some pistols and a doctor on site
Lee, you will never agree with me
But believe me, these young men don’t speak for me
Look around, look around
Oh, let me be a part of the narrative
Lafayette!
Watch me engagin’ em! Escapin’ em!Enragin’ em!
When I was given my first command
I led my men straight into a massacre
I’m runnin’ with the Sons of Liberty and I am lovin’ it!
See, that’s what happens when you up against the ruffians
You cheat with the French
Now I am fighting with France and with Spain
When you smile, you knock me out I fall apart and I thought I was so smart
You'll come of age with our young nation
Alexander Hamilton began to climb
How to account for his rise to the top?
Thomas Jefferson’s coming home!
There’s a letter on my desk from the President
This financial plan is an outrageous demand
And another thing, Mr. Age of Enlightenment
Un deux trois quatre cinq six sept huit neuf
I’m a polymath, a pain in the ass, a massive pain
You’re too kind, sir
I gave her thirty bucks that I had socked away
The room where it happened
“I know you hate ‘im, but let’s hear what he has to say.”
Since when are you a Democratic-Republican?
You’ll always be adored by the things you create
I’ll remind you that he is not Secretary of State!
Should we honor our treaty, King Louis’s head?
This is the difference, this kid is OUT!
Get in the weeds, look for the seeds of Hamilton’s misdeeds!
I’m stepping down. I’m not running for President
I’m sorry, what?
That poor man they're going to eat him alive
Jesus Christ this will be fun
Welcome folks, to the Adam’s administration.
Let’s let him know what we know.
Almost a thousand dollars, paid in different amounts…
Do you promise not to tell another soul what you saw?
I wrote about The Constitution and defended it well
I picked up a pen, I wrote my own deliverance
History has its eyes on you.
Alexander Hamilton had a torrid affair
Never gon’ be President now
You built me palaces out of paragraphs
I'm erasing myself from the narrative
The scholars say I got the same virtuosity and brains as my pops!
The ladies say my brain’s not where the resemblance stops!
There is suffering too terrible to name
The moments when you’re in so deep
It might be nice, it might be nice
To get Hamilton on your side
A man he’s despised since the beginning
I have the honor to be Your Obedient Servant
Hey, best of wives and best of women
Come back to bed, that would be enough
This man has poisoned my political pursuits!
I hear wailing in the streets
Who lives, who dies, who tells your story?
I couldn’t undo it if I tried.
And I tried";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_hamilton() {
	$chosen = hello_hamilton_get_lyric();
	echo "<p id='hello-hamilton'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_hamilton' );

// We need some CSS to position the paragraph
function hamilton_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#hello-hamilton {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'hamilton_css' );

?>
