<?php
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>
<table width="100%">
    <tr>
        <td align="left" class="bar">Administrative zone of Animal Kingdom</td>
        <td align="left">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3" align="left">
            <table width="100%" cellpadding="3" cellspacing="0">
                <tr>
                    <td align="left" class="site-State" width="18%">Quick Statistics</td>
                    <td align="left">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" class="tdtitle">Current Date/Time:</td>
                    <td align="left"><?PHP echo date('Y M, d D h:i a'); ?></td>
                </tr>
                <tr>
                    <td align="left" class="tdtitle">Login From IP :</td>
                    <td align="left"><?PHP echo $_SERVER['REMOTE_ADDR']; ?> </td>
                </tr>
                <tr>
                    <td align="left" class="tdtitle">Browser :</td>
                    <td align="left"><?= $_SERVER["HTTP_USER_AGENT"] ?> </td>
                </tr>
                <tr>
                    <td align="left" class="site-State">Total Item Statistics:</td>
                    <td align="left">&nbsp;</td>
                </tr>
                <!--<tr>
                    <td align="left" class="tdtitle">Menu:</td>
                    <td align="left">
                        <?PHP /*$query = "SELECT * FROM kyl_menu";
                        $record = mysqli_query($conn, $query);
                        echo mysqli_num_rows($record);
                        */ ?></td>
                </tr>
                <tr>
                    <td align="left" class="tdtitle">Pages:</td>
                    <td align="left">
                        <?PHP /*$query = "SELECT * FROM kyl_content";
                        $record = mysqli_query($conn, $query);
                        echo mysqli_num_rows($record);
                        */ ?></td>
                </tr>-->
                <!--<tr>
            <td align="left" class="tdtitle">News</td>
            <td align="left"><?PHP $query = "SELECT * FROM kyl_news";
                $record = mysqli_query($conn, $query);
                echo mysqli_num_rows($record); ?></td>
          </tr>-->
                <!--<tr>
            <td align="left" class="tdtitle">FAQ</td>
            <td align="left"><?PHP $query = "SELECT * FROM kyl_faq";
                $record = mysqli_query($conn, $query);
                echo mysqli_num_rows($record); ?></td>
          </tr>	-->
                <!--<tr>
            <td align="left" class="tdtitle">Testimonial</td>
            <td align="left"><?PHP $query = "SELECT * FROM kyl_testimonial";
                $record = mysqli_query($conn, $query);
                echo mysqli_num_rows($record);
                ?></td>
          </tr>		-->
            </table>
            </form>
        </td>
    </tr>
</table>
