<!-- Hello, stranger :) -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My site</title>
        <style type="text/css">
            <?php 
                // visual page setup
                $margin_left_right = "10%";
                if($_GET["theme"] === "light") 
                {
                    $background = "#FFFFFF";
                    $foreground_text = "#000000";
                    $foreground_a = "#3f51b5";
                    $foreground_a_hover = "#03a9f4";
                } 
                else 
                {
                    $background = "#000000";
                    $foreground_text = "#DFDFDF";
                    $foreground_a = "#03a9f4"; //03a9f4
                    $foreground_a_hover = "#3f51b5"; //3f51b5
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
            }
            * {
                box-sizing: border-box;
            }
            .box {
                float: left;
                width: 50%;
                padding: 5px;
            }
            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }
        </style>
    </head>
    <body>
        <form action="site.php" method="get">
            <button style="float: right;" type="submit" name="theme" value="dark">Dark</button>
            <button style="float: right;" type="submit" name="theme" value="light">Light</button>
        </form>

        <h1>Welcome</h1>

        <p>This site is meant to be kind of a guidepost of my internet footprint. Maybe even a personal blog of sorts. It is also one of those sideprojects that, unlike many, actually made it into something tangible. As such however, I cannot promise its long-term permanence (the possibility of me forgetting about the relentless domain expiration date is very plausible for example)...</p>

        <p>Most of my older projects (mid 2019 and older) can be found on my, now no longer active, <a href="https://www.instagram.com/georges_circuits/" target="_blank">Instagram</a> account. I divesified and became less active on social media since (still don't know whether there is a correlation, anyways). I am on <a href="https://twitter.com/jiri_manak" target="_blank">Twitter</a>, but I am certainly not very active by Twitter's standards. I also sometimes post on <a href="https://www.youtube.com/channel/UCNN9n9_ZPvUgNaIL2yDP8Qw" target="_blank">YouTube</a> (and subsequently <a href="https://lbry.tv/@George:f" target="_blank">LBRY</a>) but those are even worse off activity-wise. I also have <a href="https://github.com/georges-circuits/" target="_blank">GitHub</a> with some public projects and a few more private ones, I might release them if I ever get around to tidy them up.</p>

        
        <h1 style="margin-top: 50px;">2020</h1>
        <div class="clearfix">
            <div class="box">
                <h2><b>In progress:</b> Facebook datamining</h2>
            </div>
            <div class="box">
                <img src="/images/facebook_graph.gif" alt="facebook_graph">
            </div>
        </div>
        <div class="clearfix">
            <div class="box">
                <h2><b>In progress:</b> Wireless soil moisture sensors</h2>
                <p>More: <a href="/images/base_drawing.gif">base_drawing</a></p>
            </div>
            <div class="box">
                <img src="/images/base_hello.gif" alt="base_hello">
            </div>
        </div>

        
        <h1 style="margin-top: 50px;">2019</h1>
        <div class="clearfix">
            <div class="box">
                <h2>Portable bluetooth speaker</h2>
                <p>More: <a href="/images/speaker_inside_1.gif">speaker_inside_1</a>, <a href="/images/speaker_inside_2.gif">speaker_inside_2</a>, <a href="/images/speaker_diagram_cz.gif">speaker_diagram_cz</a>, <a href="/images/speaker_layer_model.gif">speaker_layer_model</a></p>
            </div>
            <div class="box">
                <img src="/images/bt_speaker.gif" alt="bt_speaker">
            </div>
        </div>

        
        <h1 style="margin-top: 50px;">2018</h1>
        <div class="clearfix">
            <div class="box">
                <h2>Watering system controller box</h2>
                <p></p>
            </div>
            <div class="box">
                <img src="/images/controller_box.gif" alt="controller_box">
            </div>
        </div>

        
        <h1 style="margin-top: 50px;">2017</h1>
        <div class="clearfix">
            <div class="box">
                <h2>More quadcopters!</h2>
                <p></p>
            </div>
            <div class="box">
                <img src="/images/quad_1.gif" alt="quad_1">
            </div>
        </div>


        <h1 style="margin-top: 50px;">2016</h1>
        <div class="clearfix">
            <div class="box">
                <h2>Arduino-based multicell Li-Po or Lead-acid battery charger</h2>
                <p>More: <a href="/images/charger_pcb_1.gif">charger_pcb_1</a>, <a href="/images/charger_pcb_2.gif">charger_pcb_2</a></p>
            </div>
            <div class="box">
                <img src="/images/charger.gif" alt="charger">
            </div>
        </div>
        <div class="clearfix">
            <div class="box">
                <h2>Obstacle avoidance robot</h2>
                <p>More: <a href="/images/robot_driving.gif">robot_driving</a></p>
            </div>
            <div class="box">
                <img src="/images/robot_top.gif" alt="robot_top">
            </div>
        </div>
        <div class="clearfix">
            <div class="box">
                <h2>Arduino-based MPPT battery charge controller V2</h2>
                <p></p>
                <p>More images: <a href="/images/mppt_inside.gif">mppt_inside</a>, <a href="/images/mppt_pcb.gif">mppt_pcb</a></p>
            </div>
            <div class="box">
                <img src="/images/mppt_display.gif" alt="Image of the MPPT's display">
            </div>
        </div>
        <div class="clearfix">
            <div class="box">
                <h2>Power bank</h2>
                <p>More images: <a href="/images/power_bank_inside.gif">power_bank_inside</a>, <a href="/images/power_bank_pcb.gif">power_bank_pcb</a></p>
            </div>
            <div class="box">
                <img src="/images/powerbank_charging.gif" alt="powerbank_charging">
            </div>
        </div>

        
        <h1 style="margin-top: 50px;">2015</h1> 
        <div class="clearfix">
            <div class="box">
                <h2>Arduino "smart watch"</h2>
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
                <img src="/images/arduino_smartwatch.gif" alt="arduino_smartwatch">
            </div>
        </div>
        <div class="clearfix">
            <div class="box">
                <h2>Arduino-based MPPT battery charge controller V1</h2>
                <p></p>
                <p>More images: <a href="/images/mppt_v1_display.gif">mppt_v1_display</a></p>
            </div>
            <div class="box">
                <img src="/images/mppt_v1.gif" alt="mppt_v1">
            </div>
        </div>


        <footer style="margin-top: 100px; font-size: 14px;">
            <p><i>Work still in progress...</i><br>
            České verze se to taky <b>možná</b> někdy dočká.</p>
            <p>Up since 3<sup>rd</sup> January 2020</p>
        </footer>
    </body>
</html>