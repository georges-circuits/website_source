<!-- Hello, stranger :) -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>About</title>
        <style type="text/css">
            <?php 
                // visual page setup
                $margin_left_right = "5%";
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
                    $foreground_a = "#03a9f4";
                    $foreground_a_hover = "#3f51b5";
                }
            ?>
            body {
                font-family: sans-serif;
                <?php echo "background-color: $background;\n"; ?>
                margin-top: 30px;
                margin-bottom: 30px;
                <?php echo "margin-right: $margin_left_right;\n"; ?>
                <?php echo "margin-left: $margin_left_right;\n"; ?>
            }
            p {
                <?php echo "color: $foreground_text;\n"; ?>
                font-size: 18px;
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
        </style>
    </head>
    <body>
        <form action="site.php" method="get">
            <button style="float: right;" type="submit" name="theme" value="dark">Dark</button>
            <button style="float: right;" type="submit" name="theme" value="light">Light</button>
        </form>

        <h1>Welcome</h1>

        <p>This site is meant to be kind of a guidepost of my internet footprint and also (maybe) a personal blog of sorts. It is also one of those sideprojects that, unlike many, actually made it into something tangible. As such however, I cannot promise its long-term permanence (the possibility of me forgetting about the relentless domain expiration date is very plausible for example)...</p>

        <p>Most of my older projects (mid 2019 and older) can be found on my, now no longer active, <a href="https://www.instagram.com/georges_circuits/" target="_blank">Instagram</a> account.</p>
        
        <p>Link test:</p>
        <p>Visit my <a href="https://github.com/georges-circuits" target="_blank">GitHub</a>.</p>

        <br>
        <br>

        <footer>
            <p>Work still in progress... <br>
            České verze se to taky možná někdy dočká...</p>
        </footer>
    </body>
</html>