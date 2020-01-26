<!-- Hello, stranger :) -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <!-- <meta name="keywords" content="blog,about"> TODO-->
        <title>manakjiri.eu</title>
        <?php
            function a_img($fname) {
                echo "<a href=\"/images/$fname\"><img src=\"/images/lq/$fname\" alt=\"$fname\"></a>";
            }
            function to_id($in) {
                $id = strtolower($in);
                $id = preg_replace("/[^a-z0-9 -]/", "", $id);
                $id = str_replace(" ", "_", $id);
                return $id;
            }
            function project_heading($heading, $in_progress=false) {
                $h = "2";
                $id = to_id($heading);
                if ($in_progress) {
                    echo "<a class=\"anchor\" id=$id></a>";
                    echo "<a class=\"a_h\" href=\"#$id\"><h$h id=\"$id\"><i>In progress:</i> $heading</h$h></a>"; 
                }
                else
                {
                    echo "<a class=\"anchor\" id=$id></a>";
                    echo "<a class=\"a_h\" href=\"#$id\"><h$h id=\"$id\">$heading</h$h></a>"; 
                }
            }
            function my_h1($heading) {
                // the name is missleading, it donesn't have to be HTML's h1
                $h = "1";
                $id = to_id($heading);
                echo "<a class=\"anchor\" id=$id></a>";
                echo "<a class=\"a_h\" href=\"#$id\"><h$h id=\"$id\">$heading</h$h></a>"; 
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
            $margin_center = join([strval(100 - (2 * intval($margin_left_right))), "%"]);
            if($theme_val === "light")
            {
                $background = "#FFFFFF";
                $foreground_text = "#000000";
                $foreground_a = "#3f51b5";
                $foreground_a_hover = "#03a9f4";
                $text_highlight = "#EEEEEE";
                $image_opacity = "1";
            } 
            else 
            {
                $background = "#000000";
                $foreground_text = "#DFDFDF";
                $foreground_a = "#03a9f4"; //03a9f4
                $foreground_a_hover = "#3f51b5"; //3f51b5
                $text_highlight = "#2E2E2E";
                $image_opacity = "0.7";
            }
        ?>
        <style type="text/css">
            body {
                font-family: sans-serif;
                <?php echo "background-color: $background;\n"; ?>
                margin-top: 30px;
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
            .code {
                font-family: "Source Code Pro", monospace;
                /* color: crimson; */
                /* <?php echo "background-color: $text_highlight;\n"; ?> */
            }
            a:link, a:visited {
                <?php echo "color: $foreground_a;\n"; ?>
                text-decoration: none;
            }
            a:hover {
                <?php echo "color: $foreground_a_hover;\n"; ?>
                text-decoration: underline;
            }
            a.a_h:link {
                text-decoration: none;
            }
            a.a_h:hover {
                text-decoration: underline;
                <?php echo "color: $foreground_a_hover;\n"; ?>
            }
            a.anchor {
                display: block;
                position: relative;
                top: -40px;
                visibility: hidden;
            }
            h1, h2, h3, h4, h5, h6 {
                <?php echo "color: $foreground_text;\n"; ?>
                font-weight: normal;
            }
            button {
                <?php echo "color: $foreground_text;\n"; ?>
                <?php echo "background-color: $background;\n"; ?>
                border: none;
                text-align: center;
                padding: 1px 10px;
            }
            button:hover, li a:hover.nav {
                <?php echo "background-color: $text_highlight;\n"; ?>
            }
            ul.nav {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                <?php echo "background-color: $background;\n"; ?>
                position: fixed;
                top: 0;
                <?php echo "width: $margin_center;\n"; ?>
            }
            li.nav {
                float: right;
            }
            li a.nav {
                display: block;
                <?php echo "color: $foreground_text;\n"; ?>
                text-align: center;
                padding: 1px 10px;
                text-decoration: none;
            }
            img {
                padding: 0;
                display: block;
                margin: 0 auto;
                max-height: 100%;
                max-width: 100%;
                padding-left: 15px;
                padding-bottom: 30px;
                <?php /* echo "opacity: $image_opacity;\n"; */ ?>
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
            @media screen and (max-width: 1000px) {
                .box {
                    width: 100%;
                }
                img {
                    padding-left: 0px;
                }
                ul.nav {
                    width: 95%;
                }
            }
        </style>
    </head>
    <body>
        <header>
            <!-- <ul class="nav">
                <li class="nav"><a class="nav" href="#disclaimer">Disclaimers</a></li>
                <li class="nav"><a class="nav" href="#things_more_people_need_to_know_about">Noteworthy</a></li>
                <li class="nav"><a class="nav" href="#2020">Projects</a></li>
                <li class="nav"><a class="nav" href="#welcome">About</a></li>
            </ul> -->
            <form action="#" method="get">
                <button style="float: right;" type="submit" name="theme" value="dark">Dark</button>
                <button style="float: right;" type="submit" name="theme" value="light">Light</button>
            </form>
        </header>
        
        <?php my_h1("Welcome"); ?>

        <p>This site is meant to be kind of a guidepost of my internet footprint. Maybe even a personal blog of sorts. It is also one of those sideprojects that, unlike many, actually made it into something tangible. As such however, I cannot promise its long-term permanence (the possibility of me forgetting about the relentless domain expiration date is very plausible for example)...</p>

        <p>Most of my older projects (mid 2019 and older) can be found on my, now no longer active, <a href="https://www.instagram.com/georges_circuits/" target="_blank">Instagram</a> account. I diversified and became less active on social media since then (still don't know whether there is a correlation, anyways). I am on <a href="https://twitter.com/jiri_manak" target="_blank">Twitter</a>, but I am certainly not very active by Twitter's standards. I also sometimes post on <a href="https://www.youtube.com/channel/UCNN9n9_ZPvUgNaIL2yDP8Qw" target="_blank">YouTube</a> (and subsequently <a href="https://lbry.tv/@George:f" target="_blank">LBRY</a>) but those are even worse off activity-wise. I also have <a href="https://github.com/georges-circuits/" target="_blank">GitHub</a> with some public projects and a few more private ones, I might release them if I ever get around to tidy them up.</p>

        <p><b>Hint:</b> All headings are links to themselves.</p>
        
        <br>
        
        <?php my_h1("2020"); ?>

        <?php project_heading("Facebook datamining", true); ?>
        <div class="clearfix">
            <div class="box">
                <p>How a random weekend project turned into my graduation work... At the beginning it was just that. I wanted to learn how to work with databases. I figured that instead of using some random JSON example I could download my data from Facebook and use that instead.</p>
                <p>I'm already satisfied with the basic functionality (the original objective) - the Python script counts the amount of messages in a specified time frame, say a week, resulting in a messages per week value which it then puts into a .csv chart. I can then take this file, open it in Excel and make a nice graph out of it.</p>
                <p>I recently also implemented the most used words counter. I'm planning to add a couple more features and make the script more interactive and intuitive to use. I haven't yet figured out whether this data could be used for at least rudimentary psychological research.</p>
                <p><i>Update:</i> I refined the project and made it <a href="https://github.com/georges-circuits/fb_conversations" target="_blank">public</a>. It's still certainly not finished yet but it works. If you clone it, it should work just fine, it uses just one non-standard package (tqdm to show progress bars) but you can edit that out of the code, it's not mandatory (just don't freak out when it hangs for a couple of minutes, sometimes it does take quite a while to chew through all those messages). I run it using python3.7.</p>
            </div>
            <div class="box">
                <?php a_img("facebook_graph.jpg"); ?>
            </div>
        </div>

        <?php project_heading("Wireless soil moisture sensors", true); ?>
        <div class="clearfix">
            <div class="box">
                <p>A network of ultra-low power low-cost maintenance-free outdoor wireless sensors connected to a base station to provide soil moisture readout for monitoring or automatic watering purposes.</p>
                <p>The image shows a working prototype of the base station. The drawing was just a very simple way of demonstrating that the touchscreen works.</p>
                <p>I'm currently in the stage of making schematics and routing the v1 PCBs. Alongside with that I'm working on some proof of concept code snippets for the individual parts of the project. I will share more details as I progress.</p>
                <p>In the works since the summer of 2019.</p>
                <p>More: <a href="/images/base_drawing.gif">base_drawing</a>, <a href="/images/base_schematic_root.jpg">base_schematic_root</a></p>
            </div>
            <div class="box">
                <?php a_img("base_hello.jpg"); ?>
            </div>
        </div>

        
        <?php my_h1("2019"); ?>

        <?php project_heading("Coincell keychain flashlight"); ?>
        <div class="clearfix">
            <div class="box">
                <p>Christmas gift for my friends. Also a pilot project for the moisture sensors. It periodically checks for movement and adjusts its "activity" value accordingly. The activity value determines how often (or if at all) it randomly flashes. It's supposed to feel like its alive, in a sense. Written out like this it doesn't sound like much but I think the effect is kinda neat and serves its purpose.</p>
                <p>It also has some more or less useful features like static flashlight and various flashing modes and a "game" which you cannot win.</p>
                <p>Source code and a little bit of documentation available on my <a href="https://github.com/georges-circuits/coincell_flashlight" target="_blank">GitHub</a></p>
                <p>More: <a href="/images/flashlight_closeup.jpg">flashlight_closeup</a>, <a href="/images/flashlight_lit.jpg">flashlight_lit</a></p>
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
            </div>
            <div class="box">
                <?php a_img("flashlight_leds_lit.jpg"); ?>
            </div>
        </div>

        <?php project_heading("Portable Bluetooth speaker"); ?>
        <div class="clearfix">
            <div class="box">
                <ul>
                    <li>Amplifiers: <b>2x10W</b> AB class</li>
                    <li>Battery: <b>37 Wh</b> 3-cell Li-Ion</li>
                    <li>Built-in analog equalizer</li>
                    <li>Bluetooth or 3.5 mm jack</li>
                    <li>Charging current: 1.5 A max (manually configurable or automatic MPPT)</li>
                    <li>Charging power: 15 W max</li>
                    <li>USB output (up to 2 A)</li>
                    <li>Requisite over-temperature and overload protections including error reporting</li>
                </ul>
                <p>Almost everything is custom designed (except the Bluetooth module and the two power converters visible <a href="/images/speaker_inside_2.jpg">here</a>, but those were modified to be controllable by the microcontroller). The enclosure is made out of <a href="/images/speaker_layer_model.jpg">layers</a> of laser cut plywood, the back is 3 mm aluminum for structural and cooling purposes. It's not the most efficient speaker in the world because it uses AB amplifiers. Pretty much all portable speakers use class D, which are way more efficient but higher distortion.</p>
                <p><b>Participated in the electronics <a href="https://www.roznovskastredni.cz/aktuality/mistrovstvi-cr-v-radiotelektronice-deti-a-mladeze-2019" target="_blank">competition</a> in Rožnov pod Radhoštěm.</b></p>
                <p>More: <a href="/images/speaker_inside_1.jpg">speaker_inside_1</a>, <a href="/images/speaker_inside_2.jpg">speaker_inside_2</a>, <a href="/images/speaker_inside_3.jpg">speaker_inside_3</a>, <a href="/images/speaker_schematic.jpg">speaker_pcb_schematic</a>, <a href="/images/speaker_diagram_cz.jpg">speaker_diagram_cz</a>, <a href="/images/speaker_layer_model.jpg">speaker_layer_model</a>, <a href="/images/speaker_io_panel.jpg">speaker_io_panel_cz</a>, <a href="/docs/dokumentace_reproduktor_2019.pdf" target="_blank">dokumentace_reproduktor_2019 [pdf]</a></p>
            </div>
            <div class="box">
                <?php a_img("bt_speaker.jpg"); ?>
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
                <?php //a_img("controller_box.jpg"); ?>
            </div>
        </div> -->
        <!-- Nothing really happened this year and this project isn't very interesting in my opinion, so that's why this is commented out... It is awkward, I know. 
        The image is up on the server in case you were wondering :) You can try to figure out the name (or checkout GitHub but don't tell that to anyone). -->

        
        <?php my_h1("2018"); ?>

        <?php project_heading("Quadcopters!"); ?>
        <div class="clearfix">
            <div class="box">
                <p>We don't call these drones, they are quadcopters, quads in short. FPV stands for First Person View, which is exactly what it sounds like - you have a camera and a video transmitter on the quad, a monitor or preferably FPV goggles with a video receiver on the ground. This is usually old school analog system with low resolution and image quality but very low delay and predictable deterioration <!-- (where a digital system would start jittering, analog maybe goes out almost completely into static, but you can usally still see at least some features of the image, which is enough to steer out of that situation) -->. It enables you to see the world from the quad's perspective, which opens up a whole range of possibilities, as you can imagine.</p>
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
                        <li><b>Turnigy Graphene 4S 1300mAh</b> 65C (mine are pretty much dead after ~60 flights. I've had 6 in total: destroyed one in a crash, 3 are starting to show signs of dying cells, still flyable but weak in punchouts and aggressive corners and the remaining two are ok)</li>
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

                <p>More images: <a href="/images/quad_scenique.jpg">quad_scenique</a>, <a href="/images/quad_charging_1.jpg">quad_charging_1</a>, <a href="/images/quad_charging_2.jpg">quad_charging_2</a>, <a href="/images/quad_field repairs.jpg">quad_field repairs</a>, <a href="/images/quad_pink_props.jpg">quad_pink_props</a>, <a href="/images/quad_aomway_goggles.jpg">quad_aomway_goggles</a>, <a href="/images/quad_on_a_bench.jpg">quad_on_a_bench</a></p>
            </div>
            <div class="box">
                <?php a_img("quad_1.jpg"); ?>
            </div>
        </div>


        <?php my_h1("2017"); ?>
        
        <?php project_heading("Arduino-based multicell Li-Po or Lead-acid battery charger"); ?>
        <div class="clearfix">
            <div class="box">
                <p>This is a 240 W battery charger with lithium battery charging and cell balancing support. It can also discharge batteries or bring them to storage charge level (in the case of Li-Po batteries).</p>
                <p>I'm not even sure why I made it. Of course it is much easier (and safer most likely) to buy a proper battery charger (which I later bought anyway. Not because this one didn't work, I just needed more chargers). I certainly learned a lot about floating differential measurement, when measuring the individual cell voltages, and design of switching DC-DC converters in the process, so it was worth it.</p>
                <p>More: <a href="/images/charger_pcb_1.jpg">charger_pcb_1</a>, <a href="/images/charger_pcb_2.jpg">charger_pcb_2</a>, <a href="/images/charger_charging.jpg">charger_charging</a>, <a href="/docs/dokumentace_li-po_nabijecka_2017.pdf" target="_blank">dokumentace_li-po_nabijecka_2017 [pdf]</a></p>
            </div>
            <div class="box">
                <?php a_img("charger.jpg"); ?>
            </div>
        </div>


        <?php my_h1("2016"); ?>

        <?php project_heading("Obstacle avoidance robot"); ?>
        <div class="clearfix">
            <div class="box">
                <p>It was supposed to be a prototyping platform for room navigation algorithms but it never really got that far. The ultrasonic sensors were very unreliable and frequently gave false measurements.</p>
                <p>I may revisit this someday. Nowadays there are sensors much better suited for this, in my opinion, like <a href="https://www.adafruit.com/product/3317" target="_blank">this</a> time of flight sensor and some mm-Wave sensors. I have certain vision in mind.</p>
                <p>More: <a href="/images/robot_driving.gif">robot_driving</a></p>
            </div>
            <div class="box">
                <?php a_img("robot_top.jpg"); ?>
            </div>
        </div>

        <?php project_heading("Arduino-based MPPT battery solar charge controller v2.0"); ?>
        <div class="clearfix">
            <div class="box">
                <p>MPPT stands for Maximum Power Point Tracking. Solar panels have a specific Load Current/Voltage <a href="https://www.ti.com/lit/an/slyt478/slyt478.pdf" target="_blank">characteristic</a>. I'll give you a real world example using actual numbers instead of pure theory. We'll connect our imaginary solar panel, which can put out 22 V at no load and 1 A when shorted, directly to our imaginary 12 V battery. The battery is going to start charging at about 1 A, which means that we're getting 12 W of power from our solar panel. Not bad right? But we can do better.</p>
                <p>See, up to a certain point the solar panel acts like a current limited power supply, so the only way to increase the power output is to increase the voltage. An efficient DC-DC buck converter can do the job, we just need to find the MPP tipping point. This is exactly what the MPPT algorithm does, it keeps nudging the load up (you can think of it as variable resistive load) while measuring the power output, if it notices that the power is dropping, it will ease off.</p>
                <p>By doing this, it should ideally find that our imaginary solar panel has its MPP at about 18 V. 1A * 18V gives us 18W of power, a 30% improvement. Of course you have to factor in the efficiency of the DC-DC converter but those are pretty efficient.</p>
                <p>I picked those numbers deliberately, because those are the specs of my 20 W polycrystalline panel which lays on the roof suspended by a couple of wires from the rooftop window (It's been like that for a couple of years now and survived quite a few storms and high winds... Still, not a preferred mounting method, I guess). In practice the simple MPPT algorithm didn't really work so ideally. If I look back, I think these were the main reasons:</p>
                <ul>
                    <li>The relatively low difference between the battery charge voltage and solar panel's MPP voltage (13.5 V and 18 V)</li>
                    <li>I'd imagine that my eyeballed component values used in the DC-DC converter have left a lot to be desired efficiency-wise</li>
                    <li>Low resolution of the AtMega328's ADCs</li>
                </ul>
                <p>I later came up with a "scanning" MPPT algorithm (I have no idea whether this is used in the industry, I think there are better ways). Every couple of minutes or so it went through the entire duty cycle range of the DC-DC converter and took note of the duty cycle value which yielded highest power output, than it sat on that value until the next scan. This worked quite well, in fact it still sits on my bench and charges batteries to this day <i>[16.1.2020]</i>. The SLA batteries themselves haven't aged very well, they hold a fraction of the rated capacity now.</p> 
                <p>I managed to snag a bargain deal on a <a href="/images/mppt_240w_panel.jpg">240 W panel</a> but I haven't managed to mount it on the roof yet (I guess my old mounting technique wouldn't work so well this time). This MPPT isn't designed to handle this much power, so there is some demand for v3.0.</p>
                <p>More: <a href="/images/mppt_inside.jpg">mppt_inside</a>, <a href="/images/mppt_pcb.jpg">mppt_pcb</a>, <a href="/docs/dokumentace_mppt_2016.pdf" target="_blank">dokumentace_mppt_2016 [pdf]</a></p>
            </div>
            <div class="box">>
                <?php a_img("mppt_display.jpg"); ?>
            </div>
        </div>

        <?php project_heading("Power bank"); ?>
        <div class="clearfix">
            <div class="box">
                <p>More images: <a href="/images/power_bank_inside.jpg">power_bank_inside</a>, <a href="/images/power_bank_pcb.jpg">power_bank_pcb</a></p>
            </div>
            <div class="box">
                <?php a_img("powerbank_charging.gif"); ?>
            </div>
        </div>

        
        <?php my_h1("2015"); ?>

        <?php project_heading("Arduino \"smart watch\""); ?>
        <div class="clearfix">
            <div class="box">
                <ul>
                    <li>Arduino pro mini</li>
                    <li>0.96" OLED display</li>
                    <li>Real Time Clock (RTC)</li>
                    <li>NRF24L01+ 2.4GHz wireless TRX module</li>
                    <li>Li-Po battery /w protection and charging board</li>
                </ul>
                <p>More images: <a href="/images/smartwatch_tick.gif">smartwatch_tick</a>, <a href="/images/arduino_smartwatch_2.jpg">arduino_smartwatch_2</a></p>
            </div>
            <div class="box">
                <?php a_img("arduino_smartwatch.jpg"); ?>
            </div>
        </div>

        <?php project_heading("Arduino-based MPPT battery solar charge controller v1.0"); ?>
        <div class="clearfix">
            <div class="box">
                <p>An MPPT prototype and foundation of the <a href="#arduino-based_mppt_battery_solar_charge_controller_v20">second version</a>. I would be repeating myself in documenting this.</p>
                <p>I obviously took some inspiration from Julian Ilett's <a href="https://www.youtube.com/watch?v=MSz4-cr3EJw" target="_blank">MPPT</a>.</p>
                <p>More images: <a href="/images/mppt_v1_display.jpg">mppt_v1_display</a></p>
            </div>
            <div class="box">
                <?php a_img("mppt_v1.jpg"); ?>
            </div>
        </div>


        <!-- <?php my_h1("Things more people need to know about"); ?> -->

        
        
        <?php
            logEvent(join([$_SERVER['HTTP_ACCEPT_LANGUAGE'], " || ", $_SERVER['SERVER_PROTOCOL'], " || ", $_SERVER['HTTP_USER_AGENT'], " || ", $theme_val]));
        ?>

        <footer style="margin-top: 150px;">
            <p><i>Work in progress...</i><br>
            České verze se to také <b>možná</b> někdy dočká.</p>
            <p id="disclaimer"><b>Disclaimer:</b> The site logs information about your browser. This is what a log line looks like: <code class="code">2020/01/15 10:40:37: en,cs-CZ;q=0.9,cs;q=0.8 || HTTP/1.1 || Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36 || dark</code>. I'm doing it purely out of curiosity. I'm putting this disclosure here because I want to be transparent about what it is that I'm doing with data. Checkout the <a href="https://github.com/georges-circuits/website_source" target="_blank">GitHub repo</a> to verify that that's actually what's happening and let me know if you don't agree with this. <br>
            This site does not store any cookies. (click on the <a href="/images/check_cookies_yourself.jpg">lock</a> icon and see Cookies to verify)</p>
            <p>Up since the 3<sup>rd</sup> of January 2020<br>
            Last update: 25.1.2020 <a style="float: right;" href="#">Return up</a></p>
        </footer>
    </body>
</html>
