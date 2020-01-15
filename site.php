<!-- Hello, stranger :) -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <!-- <meta name="keywords" content="blog,about"> TODO-->
        <title>My site</title>
        <style type="text/css">
            <?php
                function a_img($fname) {
                    echo "<a href=\"/images/$fname\"><img src=\"/images/lq/$fname\" alt=\"$fname\"></a>";
                }
                function logEvent($message) {
                    if ($message != '') {
                        // Add a timestamp to the start of the $message
                        $message = date("Y/m/d H:i:s").': '.$message;
                        $fp = fopen('logs/log.txt', 'a');
                        fwrite($fp, $message."\n");
                        fclose($fp);
                    }
                }
                
                // visual page setup
                $theme_val = $_GET["theme"];
                $margin_left_right = "5%";
                if($theme_val === "light")
                {
                    $background = "#FFFFFF";
                    $foreground_text = "#000000";
                    $foreground_a = "#3f51b5";
                    $foreground_a_hover = "#03a9f4";
                    $text_highlight = "#EEEEEE";
                } 
                else 
                {
                    $background = "#000000";
                    $foreground_text = "#DFDFDF";
                    $foreground_a = "#03a9f4"; //03a9f4
                    $foreground_a_hover = "#3f51b5"; //3f51b5
                    $text_highlight = "#2E2E2E";
                }
            ?>
            body {
                font-family: sans-serif;
                <?php echo "background-color: $background;\n"; ?>
                margin-top: 50px;
                margin-bottom: 30px;
                <?php echo "margin-right: $margin_left_right;\n"; ?>
                <?php echo "margin-left: $margin_left_right;\n"; ?>
            }
            p, ul {
                <?php echo "color: $foreground_text;\n"; ?>
                font-size: 16px;
            }
            ul li {
                padding: 3px;
                margin-left: -10px;
            }
            a:link, a:visited {
                <?php echo "color: $foreground_a;\n"; ?>
            }
            a:hover {
                <?php echo "color: $foreground_a_hover;\n"; ?>
            }
            h1, h2, h3, h4, h5, h6 {
                <?php echo "color: $foreground_text;\n"; ?>
                font-weight: normal;
            }
            h1 {
                margin-top: 50px;
            }
            button {
                <?php echo "color: $foreground_text;\n"; ?>
                <?php echo "background-color: $background;\n"; ?>
                border: none;
            }
            img {
                padding: 0;
                display: block;
                margin: 0 auto;
                max-height: 100%;
                max-width: 100%;
                margin-left: 10px;
            }
            * {
                box-sizing: border-box;
            }
            .box {
                float: left;
                width: 50%;
            }
            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }
            /* mobile devices and small screens */
            @media screen and (max-width: 800px) {
                .box {
                    width: 100%;
                }
                img {
                    margin-left: 0px;
                }
            }
        </style>
    </head>
    <body>
        <form action="site.php" method="get">
            <button style="float: right;" type="submit" name="theme" value="dark">Dark</button>
            <button style="float: right;" type="submit" name="theme" value="light">Light</button>
        </form>

        <?php
            logEvent(join([$_SERVER['HTTP_ACCEPT_LANGUAGE'], " || ", $_SERVER['SERVER_PROTOCOL'], " || ", $_SERVER['HTTP_USER_AGENT'], " || ", $theme_val]));
        ?>

        
        <h1 id="welcome">Welcome</h1>

        <p>This site is meant to be kind of a guidepost of my internet footprint. Maybe even a personal blog of sorts. It is also one of those sideprojects that, unlike many, actually made it into something tangible. As such however, I cannot promise its long-term permanence (the possibility of me forgetting about the relentless domain expiration date is very plausible for example)...</p>

        <p>Most of my older projects (mid 2019 and older) can be found on my, now no longer active, <a href="https://www.instagram.com/georges_circuits/" target="_blank">Instagram</a> account. I diversified and became less active on social media since then (still don't know whether there is a correlation, anyways). I am on <a href="https://twitter.com/jiri_manak" target="_blank">Twitter</a>, but I am certainly not very active by Twitter's standards. I also sometimes post on <a href="https://www.youtube.com/channel/UCNN9n9_ZPvUgNaIL2yDP8Qw" target="_blank">YouTube</a> (and subsequently <a href="https://lbry.tv/@George:f" target="_blank">LBRY</a>) but those are even worse off activity-wise. I also have <a href="https://github.com/georges-circuits/" target="_blank">GitHub</a> with some public projects and a few more private ones, I might release them if I ever get around to tidy them up.</p>
        
        <br>
        
        <h1 id="2020">2020</h1>

        <h2><i>In progress:</i> Facebook datamining</h2>
        <div class="clearfix">
            <div class="box">
                <p>How a random weekend project turned into my graduation work... At the beginning it was just that. I wanted to learn how to work with databases. I figured that instead of using some random JSON example I could download my data from Facebook and use that instead.</p>
                <p>I'm already satisfied with the basic functionality (the original objective) - the Python script counts the amount of messages in a specified time frame, say a week, resulting in a messages per week value which it then puts into a .csv chart. I can then take this file, open it in Excel and make a nice graph out of it.</p>
                <p>I recently also implemented the most used words counter. I'm planning to add a couple more features and make the script more interactive and intuitive to use. I haven't yet figured out whether this data could be used for at least rudimentary psychological research.</p>
            </div>
            <div class="box">
                <?php a_img("facebook_graph.gif"); ?>
            </div>
        </div>

        <h2><i>In progress:</i> Wireless soil moisture sensors</h2>
        <div class="clearfix">
            <div class="box">
                <p>A network of ultra-low power low-cost maintenance-free outdoor wireless sensors connected to a base station to provide soil moisture readout for monitoring or automatic watering purposes.</p>
                <p>In the works since the summer of 2019.</p>
                <p>More: <a href="/images/base_drawing.gif">base_drawing</a></p>
            </div>
            <div class="box">
                <?php a_img("base_hello.gif"); ?>
            </div>
        </div>

        
        <h1 id="2019">2019</h1>

        <h2>Coincell keychain flashlight</h2>
        <div class="clearfix">
            <div class="box">
                <p>Christmas gift for my friends. Also a pilot project for the moisture sensors. It periodically checks for movement and adjusts its "activity" value accordingly. The activity value determines how often (or if at all) it randomly flashes. It's supposed to feel like its alive, in a sense. Written out like this it doesn't sound like much but I think the effect is kinda neat and serves its purpose.</p>
                <p>It also has some more or less useful features like static flashlight and various flashing modes and a "game" which you cannot win.</p>
                <p>Source code and a little bit of documentation available on my <a href="https://github.com/georges-circuits/coincell_flashlight" target="_blank">GitHub</a></p>
                <br>
                <p><b>User Manual</b> for those I told to search for it here:
                <ul>
                    <li>Flick it and simultaneously press the button to get into the menu or keep holding the button and the light will come on.</li>
                    <li>Menu:<ul>
                        <li>Red: Exit menu</li>
                        <li>Orange: Flashing mode 1 (exit by pressing the button, no timeout)</li>
                        <li>Yellow: Flashing mode 2 (exit by pressing the button, no timeout)</li>
                        <li>Green: The game (Have fun! If you figure out how to play it, congratulate yourself)</li>
                        <li>Blue: Suspend the random flashing for 24 hours</li>
                        <li>Purple: Show battery level</li>
                    </ul></li>
                </ul></p>
                <p>More: <a href="/images/flashlight_leds_lit.gif">flashlight_leds_lit</a></p>
            </div>
            <div class="box">
                <?php a_img("coincell_flashlight.gif"); ?>
            </div>
        </div>

        <h2>Portable Bluetooth speaker</h2>
        <div class="clearfix">
            <div class="box">
                <ul>
                    <li>Amplifiers: <b>2x10W</b> AB class</li>
                    <li>Battery: <b>37 Wh</b></li>
                    <li>Built-in analog equalizer</li>
                    <li>Bluetooth or 3.5 mm jack</li>
                    <li>Charging current: 1.5 A max (manually configurable or automatic MPPT)</li>
                    <li>Charging power: 15 W max</li>
                    <li>Requisite over-temperature and overload protections including error displays</li>
                </ul>
                <p>Almost everything is custom designed (except the Bluetooth module and the two power converters visible <a href="/images/speaker_inside_1.gif">here</a>, but those were modified to be controllable by the microcontroller). The enclosure is made out of <a href="/images/speaker_layer_model.gif">layers</a> of laser cut plywood, the back is 3 mm aluminum for structural and cooling purposes. It's not the most efficient speaker in the world because it uses AB amplifiers. Pretty much all portable speakers use class D, which are way more efficient but higher distortion.</p>
                <p><b>Participated in the electronics <a href="https://www.roznovskastredni.cz/aktuality/mistrovstvi-cr-v-radiotelektronice-deti-a-mladeze-2019" target="_blank">competition</a> in Rožnov pod Radhoštěm.</b></p>
                <p>More: <a href="/images/speaker_inside_1.gif">speaker_inside_1</a>, <a href="/images/speaker_inside_2.gif">speaker_inside_2</a>, <a href="/images/speaker_inside_3.gif">speaker_inside_3</a>, <a href="/images/speaker_schematic.gif">speaker_pcb_schematic</a>, <a href="/images/speaker_diagram_cz.gif">speaker_diagram_cz</a>, <a href="/images/speaker_layer_model.gif">speaker_layer_model</a>, <a href="/images/speaker_io_panel.gif">speaker_io_panel_cz</a></p>
            </div>
            <div class="box">
                <?php a_img("bt_speaker.gif"); ?>
            </div>
        </div>

        
        <!-- <h1>2018</h1>

        <h2>Watering system controller box</h2>
        <div class="clearfix">
            <div class="box">
            <p><i>Description will be added soon</i></p>
                <p></p>
            </div>
            <div class="box">
                <?php //a_img("controller_box.gif"); ?>
            </div>
        </div> -->
        <!-- Nothing really happened this year and this project isn't very interesting in my opinion, so that's why this is commented out... It is awkward, I know. 
        The image is up on the server in case you were wondering :) You can try to figure out the name (or checkout GitHub but don't tell that to anyone). -->

        
        <h1 id="2017/18">2017/18</h1>

        <h2>Quadcopters!</h2>
        <div class="clearfix">
            <div class="box">
                <p>We don't call these drones, they are quadcopetrs, quads in short. FPV stands for First Person View, which is exactly what it sounds like - you have a camera and a video transmitter on the quad, a monitor or preferably FPV goggles with a video receiver on the ground. This is usually old school analog system with low resolution and image quality but very low delay and predictable ditioration <!-- (where a digital system would start jittering, analog maybe goes out almost completely into static, but you can usally still see at least some features of the image, which is enough to steer out of that situation) -->. It enables you to see the world from the quad's perspective, which opens up a whole range of possibilities, as you can imagine.</p>
                <p>The one you can see on the right is my latest one:
                <ul>
                    <li>Quad itself:<ul>
                        <li>Frame: <b>Martian II</b></li>
                        <li>Motors: <b>BrotherHobby R4 2300KV</b></li>
                        <li>Speed controllers (ESCs): <b>Racerstar LiteS 30A</b></li>
                        <li>Flight controller (FC): <b>Betaflight F3</b></li>
                        <li>Radio receiver: <b>FrSky X4R</b></li>
                        <li>FPV Camera: <b>RunCam micro Sparrow 2</b></li>
                        <li>FPV video transmitter (VTX): <b>Eachine TX526</b></li>
                        <li>FPV 5.8 GHz antenna: Some DYS antenna wrapped in heatshrink</li>
                        <li>Propellers: <b>Dalprop T5046</b> (stable, well rounded, durable, little slow but fun), <b>Emax AVAN-R 5065</b> (the most aggressive props I know, extremely high power draw, they give you a sense of absolute control, amazing handling, snappiness and immediate response to input, really fast and a joy to fly but will destroy your batteries and reduce flight time by 30%), <b>Gemfan 5152 triblade</b> (first prop I tried that actually felt different, relatively high speed, nice handling, little heavy, durable to a point)</li>
                    </ul></li>
                    <li>Batteries:<ul>
                        <li>These things are, in my opinion, holding this hobby back the most. Quads are extremely power hungry and are constantly pushing batteries way beyond their limits, as a result, the batteries only last anywhere from 30 to 100 flights, which makes them probably the most expensive part of this hobby in the long term.</li>
                        <li><b>Turnigy Graphene 4S 1300mAh</b> 65C (mine are pretty much dead after ~60 flights. I've had 6 in total: destroyed one in a crash, 3 are starting to show signs of dying cells, still flyable but weak in punchouts and aggresive corners and the remaining two are ok)</li>
                        <li><b>Turnigy Multistar 4S 1400mAh</b> 65C (these have lasted quite a bit longer with some clocking in about 150 flights, but they were weaker throughout compared to the Graphenes)</li>
                    </ul></li>
                    <li>Ground equipment:<ul>
                        <li>Radio controller: <b>FrSky QX7</b></li>
                        <li>FPV goggles: <b>Aomway Commanders</b></li>
                        <li>Charger: <b>ISDT SC-608</b></li>
                    </ul></li>
                    <li>Camera: <b>Xiaomi Yi</b> (original) - the one in the orange case, you wouldn't want to publish the recorded FPV feed.</li>
                </ul></p>
                <p>One of the first questions people have, after asking about the range, maximum speed and whether it can spy on you, is how much all this would cost in case they wanted to get into it. I never know how to approach this because if I tell them the amount, It'll most likely scare them off. It's not a cheap hobby to get into, that's for sure, <i>especially</i> initially when starting from zero. However, once you've acquired things like the radio, goggles and a charger, building and maintaining quads isn't that much of an expense.</p>
                <p>Some of my flight videos: <a href="https://www.youtube.com/watch?v=7sWXnBD_3wk" target="_blank">The Best FPV Moments of 2017</a>, <a href="https://www.youtube.com/watch?v=lZ6qBc3ujX4" target="_blank">Exploring new places</a>, <a href="https://www.youtube.com/watch?v=idLPhe0tJ7k" target="_blank">Flow - FPV practice</a></p>
                <p>More images: <a href="/images/quad_scenique.gif">quad_scenique</a>, <a href="/images/quad_charging_1.gif">quad_charging_1</a>, <a href="/images/quad_charging_2.gif">quad_charging_2</a></p>
            </div>
            <div class="box">
                <?php a_img("quad_1.gif"); ?>
            </div>
        </div>


        <h1 id="2016">2016</h1>

        <h2>Arduino-based multicell Li-Po or Lead-acid battery charger</h2>
        <div class="clearfix">
            <div class="box">
            <p><i>Description will be added soon</i></p>
                <p>More: <a href="/images/charger_pcb_1.gif">charger_pcb_1</a>, <a href="/images/charger_pcb_2.gif">charger_pcb_2</a></p>
            </div>
            <div class="box">
                <?php a_img("charger.gif"); ?>
            </div>
        </div>

        <h2>Obstacle avoidance robot</h2>
        <div class="clearfix">
            <div class="box">
                <p><i>Description will be added soon</i></p>
                <p>More: <a href="/images/robot_driving.gif">robot_driving</a></p>
            </div>
            <div class="box">
                <?php a_img("robot_top.gif"); ?>
            </div>
        </div>

        <h2>Arduino-based MPPT battery solar charge controller v2.0</h2>
        <div class="clearfix">
            <div class="box">
                <p>MPPT stands for Maximum Power Point Tracking. Solar panels have a <a href="https://www.ti.com/lit/an/slyt478/slyt478.pdf" target="_blank">speciffic</a> Load Current/Voltage characteristic. I'll give you a real world example using actual numbers instead of pure theory. We'll connect our imaginary solar panel, which can put out 22 V at no load and 1 A when shorted, directly to our imaginary 12 V battery. The battery is going to start charging at about 1 A, which means that we're getting 12 W of power from our solar panel. Not bad right? But we can do better. See, up to a certain point the solar panel acts like a current limited power supply, so the only way to increase the power output is to increase the voltage. An efficient DC-DC buck converter can do the job, we just need to find the tipping point, this is exactly what MPPT algorith does.</p>
                <p>More images: <a href="/images/mppt_inside.gif">mppt_inside</a>, <a href="/images/mppt_pcb.gif">mppt_pcb</a></p>
            </div>
            <div class="box">>
                <?php a_img("mppt_display.gif"); ?>
            </div>
        </div>

        <h2>Power bank</h2>
        <div class="clearfix">
            <div class="box">
                <p><i>Description will be added soon</i></p>
                <p>More images: <a href="/images/power_bank_inside.gif">power_bank_inside</a>, <a href="/images/power_bank_pcb.gif">power_bank_pcb</a></p>
            </div>
            <div class="box">
                <?php a_img("powerbank_charging.gif"); ?>
            </div>
        </div>

        
        <h1 id="2015">2015</h1> 

        <h2>Arduino "smart watch"</h2>
        <div class="clearfix">
            <div class="box">
                <ul>
                    <li>Arduino pro mini</li>
                    <li>0.96" OLED display</li>
                    <li>Real Time Clock (RTC)</li>
                    <li>NRF24L01+ 2.4GHz wireless TRX module</li>
                    <li>Li-Po battery /w protection and charging board</li>
                </ul>
                <p>More images: <a href="/images/smartwatch_tick.gif">smartwatch_tick</a>, <a href="/images/arduino_smartwatch_2.gif">arduino_smartwatch_2</a></p>
            </div>
            <div class="box">
                <?php a_img("arduino_smartwatch.gif"); ?>
            </div>
        </div>

        <h2>Arduino-based MPPT battery solar charge controller v1.0</h2>
        <div class="clearfix">
            <div class="box">
                <p><i>Description will be added soon</i></p>
                <p>I obviously took some inspiration from Julian Ilett's <a href="https://www.youtube.com/watch?v=MSz4-cr3EJw" target="_blank">MPPT</a>.</p>
                <p>More images: <a href="/images/mppt_v1_display.gif">mppt_v1_display</a></p>
            </div>
            <div class="box">
                <?php a_img("mppt_v1.gif"); ?>
            </div>
        </div>


        <footer style="margin-top: 100px;">
            <p><i>Work in progress...</i><br>
            České verze se to taky <b>možná</b> někdy dočká.</p>
            <p><b>Disclaimer:</b> The site logs information about your browser (mainly the language preference and things like your browser name and the device you are using for debugging purposes). This is what a log line looks like: <i <?php echo "style=\"background-color: $text_highlight;\""; ?>>2020/01/15 10:40:37: en,cs-CZ;q=0.9,cs;q=0.8 || HTTP/1.1 || Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36 || dark</i>. I'm doing it purely out of curiosity. I'm putting this disclosure here because I want to be transparent about what it is that I'm doing with data. Checkout the <a href="https://github.com/georges-circuits/website_source" target="_blank">GitHub repo</a> to verify that that's actually what's happening and let me know if you don't agree with this.</p>
            <p>Up since the 3<sup>rd</sup> of January 2020 <br>
            Last update: 15.1.2020</p>
        </footer>
    </body>
</html>