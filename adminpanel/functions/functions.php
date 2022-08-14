<?php
function trimBody($theText, $lmt = 100, $s_chr = "@@@", $s_cnt = 1)
{
    $pos = 0;
    $trimmed = FALSE;
    for ($i = 1; $i <= $s_cnt; $i++) {
        if ($tmp = strpos($theText, $s_chr, $pos)) {
            $pos = $tmp;
            $trimmed = TRUE;
        } else {
            $pos = strlen($theText);
            $trimmed = FALSE;
            break;
        }
    }
    $theText = substr($theText, 0, $pos);

    if (strlen($theText) > $lmt) {
        $theText = substr($theText, 0, $lmt);
        $theText = substr($theText, 0, strrpos($theText, ' '));
        $trimmed = TRUE;
    }
    if ($trimmed) $theText .= '...';
    return $theText;
}

function msgBox($m, $t, $d = "index.php", $s = "Info")
{
    $theMsg = "<div id=\"requestConfirm" . $s . "\">";
    $theMsg .= "<h2>" . $t . "</h2>\n";
    $theMsg .= "<p>" . $m . "</p>";
    $theMsg .= "<p><a href=\"" . $d . "\" ";
    $theMsg .= "class=\"detail\">";
    $theMsg .= "Yes</a>";
    $theMsg .= "<a href=\"index.php?goto=forum\" class=\"detail\">";
    $theMsg .= "No</a></p>";
    $theMsg .= "</div>";
    return $theMsg;
}

function getForum($id)
{
    $sql = "SELECT forum_name as name, forum_desc as description, " .
        "forum_moderator as 'mod' " .
        "FROM forum_forum " .
        "WHERE id = " . $id;
    $result = mysql_query($sql)
    or die(mysql_error() . "<br>" . $sql);
    $row = mysql_fetch_array($result);
    return $row;
}

function getForumID($topicid)
{
    $sql = "SELECT forum_id FROM forum_posts WHERE id=$topicid";
    $result = mysql_query($sql)
    or die(mysql_error() . "<br>" . $sql);
    $row = mysql_fetch_array($result);
    return $row['forum_id'];
}

function breadcrumb($id, $getfrom = "F")
{
    $sep = "<span class=\"bcsep\">";
    $sep .= " &middot; ";
    $sep .= "</span>";
    if ($getfrom == "P") {
        $sql = "SELECT forum_id, subject FROM forum_posts " .
            "WHERE id = " . $id;
        $result = mysql_query($sql)
        or die(mysql_error() . "<br>" . $sql);
        $row = mysql_fetch_array($result);
        $id = $row['forum_id'];
        $topic = $row['subject'];
    }
    $row = getForum($id);
    $bc = "<a href=\"index.php?goto=forum\" class=breadcrum>Forum Home</a>$sep";
    switch ($getfrom) {
        case "P":
            $bc .= "<a href=\"index.php?goto=forum&prod=viewforum&f=$id\" class=breadcrum>" . $row['name'] .
                "</a>$sep" . $topic;
            break;

        case "F":
            $bc .= $row['name'];
            break;
    }
    return "<h4 class=\"breadcrumb\">" . $bc . "</h4>";
}

function showTopic($topicid, $showfull = TRUE)
{

    global $userid;
    global $limit;

    echo breadcrumb($topicid, "P");
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    if ($limit == "") $limit = 5;
    $start = ($page - 1) * $limit;

    echo topicReplyBar($topicid, getForumID($topicid), "right");
    echo "<br>";

    $sql = "SELECT SQL_CALC_FOUND_ROWS " .
        "p.id, p.subject, p.body, p.date_posted, " .
        "p.date_updated, u.firstname as author, u.users_id as author_id, " .
        "u.signature as sig, c.count as postcount, " .
        "p.forum_id as forum_id, f.forum_moderator as 'mod', " .
        "p.update_id, u2.firstname as updated_by " .
        "FROM forum_forum f " .
        "JOIN forum_posts p " .
        "ON f.id = p.forum_id " .
        "JOIN forum_users u " .
        "ON u.users_id = p.author_id " .
        "LEFT JOIN forum_users u2 " .
        "ON u2.users_id = p.update_id " .
        "LEFT JOIN forum_postcount c " .
        "ON u.users_id = c.user_id " .
        "WHERE (p.topic_id = $topicid OR p.id = $topicid) " .
        "ORDER BY p.topic_id DESC, p.date_posted " .
        "LIMIT $start,$limit";
    $result = mysql_query($sql)
    or die(mysql_error() . "<br>" . $sql);
    $pagelinks = paginate($limit);
    if (mysql_num_rows($result) == 0) {
        $msg = "There are currently no posts.  Would you " .
            "like to be the first person to create a thread?";
        $title = "No Posts...";
        $dest = "index.php?goto=forum&prod=compose&forumid=" . $forumid;
        $sev = "Info";
        $message = msgBox($msg, $title, $dest, $sev);
        echo $message;
    } else {
        echo "<table class=\"forumtable\" cellspacing=\"0\" ";
        echo "cellpadding=\"2\" width=100%><tr>";
        echo "<th class=\"author\">Author</th>";
        echo "<th class=\"post\">Post</th>";
        echo "</tr>";
        $rowclass = "";
        while ($row = mysql_fetch_array($result)) {
            $lastupdate = "";
            $editlink = "";
            $dellink = "";
            $replylink = "&nbsp;";
            $pcount = "";
            $pdate = "";
            $sig = "";
            if ($showfull) {
                $body = $row['body'];

                $replylink = "<a href=\"index.php?goto=forum&prod=compose&forumid=" .
                    $row['forum_id'] . "&topicid=$topicid&reid=" . $row['id'] .
                    "\" class=\"breadcrum\">REPLY</a>&nbsp;";


                if ($row['update_id'] > 0) {
                    $lastupdate = "<p class=\"smallNote\">Last updated: " .
                        $row['date_updated'] . " by " .
                        $row['updated_by'] . "</p>";
                }
                if (($userid == $row['author_id']) or
                    ($userid == $row['mod']) or
                    ($_SESSION['access_lvl'] > 2)) {
                    $editlink = "<a href=\"index.php?goto=forum&prod=compose&a=edit&post=" . $row['id'] .
                        "\" class=\"breadcrum\">EDIT</a>&nbsp;";
                    $dellink = "<a href=\"index.php?goto=forum&prod=transact-affirm&action=deletepost&" .
                        "id=" . $row['id'] .
                        "\" class=\"breadcrum\">DELETE</a>&nbsp;";
                }
                $pcount = "<br><span class=\"textsmall\">Posts: " .
                    ($row['postcount'] == "" ? "0" : $row['postcount']) . "</span>";
                $pdate = $row['date_posted'];
                $sig = ($row['sig'] != "" ? "<p class=\"sig\">" .
                        bbcode(nl2br($row['sig'])) : "") . "</p>";
            } else {
                $body = trimBody($body);
            }
            $rowclass = ($rowclass == "row1" ? "row2" : "row1");
            echo "<tr class=\"$rowclass\">";
            echo "<td class=\"author\">" . $row['author'];
            echo $pcount;
            echo "</td><td class=\"post\"><p>";
            if (isset($_SESSION['userid'])
                and ($_SESSION['last_login'] < $row['date_posted'])) {
                echo NEWPOST . " ";
            }
            if (isset($_GET['page'])) {
                $pagelink = "&page=" . $_GET['page'];
            } else {
                $pagelink = "";
            }
            echo "<a name=\"post" . $row['id'] .
                "\" href=\"index.php?goto=forum&prod=viewtopic&t=" . $topicid . $pagelink . "#post" .
                $row['id'] . "\" class=breadcrum>" . POSTLINK . "</a>";
            if (isset($row['subject'])) {
                echo " <strong>" . $row['subject'] . "</strong>";
            }
            echo "</p><p>" . bbcode(nl2br(htmlspecialchars($body))) . "</p>";
            echo $sig;
            echo $lastupdate;
            echo "</td></tr>";
            echo "<tr class=\"$rowclass\"><td class=\"authorfooter\">";
            echo $pdate . "</td><td class=\"threadfooter\">";
            echo $replylink;
            echo $editlink;
            echo $dellink;
            echo "</td></tr>\n";
        }
        echo "</table>";
        echo $pagelinks;
        echo "<p class=prod_txt3>" . NEWPOST . " = New Post&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo POSTLINK . " = Post link (use to bookmark)</p>";
    }
}

function isParent($page)
{
    $currentpage = $_SERVER['PHP_SELF'];
    if (strpos($currentpage, $page) === false) {
        return FALSE;
    } else {
        return TRUE;
    }
}

function topicReplyBar($topicid, $forumid, $pos = "right")
{
    $html = "<p class=\"buttonBar" . $pos . "\">";
    if ($topicid > 0) {
        $html .= "<a href=\"index.php?goto=forum&prod=compose&forumid=$forumid" .
            "&topicid=$topicid&reid=$topicid\" " .
            "class=\"detail\">Reply to Thread</a>";
    }
    if ($forumid > 0) {
        $html .= "   <a href=\"index.php?goto=forum&prod=compose&forumid=$forumid\" " .
            "class=\"detail\">New Thread</a>";
    }
    $html .= "</p>";
    return $html;
}

function userOptionList($level)
{
    $sql = "SELECT users_id, firstname, lastname , access_lvl " .
        "FROM forum_users " .
        "WHERE access_lvl=" . $level . " " .
        "ORDER BY firstname";
    $result = mysql_query($sql)
    or die(mysql_error());

    while ($row = mysql_fetch_array($result)) {
        echo "<option value=\"" . $row['users_id'] . "\">" .
            htmlspecialchars($row['firstname']) . "</option>";
    }
}

function paginate($limit = 10)
{
    global $admin;

    $sql = "SELECT FOUND_ROWS();";

    $result = mysql_query($sql)
    or die(mysql_error());
    $row = mysql_fetch_array($result);
    $numrows = $row[0];
    $pagelinks = "<div class=\"pagination\">";
    if ($numrows > $limit) {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $currpage = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
        $currpage = str_replace("&page=" . $page, "", $currpage);

        if ($page == 1) {
            $pagelinks .= "<span class=\"current\">&lt; PREV</span>";
        } else {
            $pageprev = $page - 1;
            $pagelinks .= "<a class=\"pageprevlink\" href=\"" . $currpage .
                "&page=" . $pageprev . "\">&lt; PREV</a>";
        }

        $numofpages = ceil($numrows / $limit);
        $range = $admin['pageRange']['value'];
        if ($range == "" or $range == 0) $range = 7;
        $lrange = max(1, $page - (($range - 1) / 2));
        $rrange = min($numofpages, $page + (($range - 1) / 2));
        if (($rrange - $lrange) < ($range - 1)) {
            if ($lrange == 1) {
                $rrange = min($lrange + ($range - 1), $numofpages);
            } else {
                $lrange = max($rrange - ($range - 1), 0);
            }
        }

        if ($lrange > 1) {
            $pagelinks .= "..";
        } else {
            $pagelinks .= "&nbsp;&nbsp;";
        }
        for ($i = 1; $i <= $numofpages; $i++) {
            if ($i == $page) {
                $pagelinks .= "<span class=\"current\">$i</span>";
            } else {
                if ($lrange <= $i and $i <= $rrange) {
                    $pagelinks .= "<a class=\"pagenumlink\" " .
                        "href=\"" . $currpage . "&page=" . $i .
                        "\">" . $i . "</a>";
                }
            }
        }
        if ($rrange < $numofpages) {
            $pagelinks .= "...";
        } else {
            $pagelinks .= "&nbsp;&nbsp;&nbsp;";
        }

        if (($numrows - ($limit * $page)) > 0) {
            $pagenext = $page + 1;
            $pagelinks .= "<a class=\"pagenextlink\" href=\"" . $currpage .
                "&page=" . $pagenext . "\">NEXT &gt;</a>";
        } else {
            $pagelinks .= "<span class=\"current\">NEXT &gt;</span>";
        }
    } else {
        $pagelinks .= "<span class=\"current\">&lt; " .
            "PREV</span>&nbsp;&nbsp;";
        $pagelinks .= "<span class=\"current\"> " .
            "NEXT &gt;</span>&nbsp;&nbsp;";
    }
    $pagelinks .= "</div>";
    return $pagelinks;
}


function paginate_search($limit = 10, $keywords)
{
    global $admin;

    $sql = "SELECT * FROM forum_posts 
								WHERE (subject LIKE '%" . $keywords . "%' OR body LIKE '%" . $keywords . "%') ORDER BY date_posted";


    $result = mysql_query($sql)
    or die(mysql_error());
    $row = mysql_num_rows($result);
    $numrows = $row;

    $pagelinks = "<div class=\"pagination\">";
    if ($numrows > $limit) {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $currpage = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
        $currpage = str_replace("&page=" . $page, "", $currpage);

        if ($page == 1) {
            $pagelinks .= "<span class=\"current\">&lt; PREV</span>";
        } else {
            $pageprev = $page - 1;
            $pagelinks .= "<a class=\"pageprevlink\" href=\"" . $currpage .
                "&keywords=" . $keywords . "&page=" . $pageprev . "\">&lt; PREV</a>";
        }

        $numofpages = ceil($numrows / $limit);
        $range = $admin['pageRange']['value'];
        if ($range == "" or $range == 0) $range = 7;
        $lrange = max(1, $page - (($range - 1) / 2));
        $rrange = min($numofpages, $page + (($range - 1) / 2));
        if (($rrange - $lrange) < ($range - 1)) {
            if ($lrange == 1) {
                $rrange = min($lrange + ($range - 1), $numofpages);
            } else {
                $lrange = max($rrange - ($range - 1), 0);
            }
        }

        if ($lrange > 1) {
            $pagelinks .= "..";
        } else {
            $pagelinks .= "&nbsp;&nbsp;";
        }
        for ($i = 1; $i <= $numofpages; $i++) {
            if ($i == $page) {
                $pagelinks .= "<span class=\"current\">$i</span>";
            } else {
                if ($lrange <= $i and $i <= $rrange) {
                    $pagelinks .= "<a class=\"pagenumlink\" " .
                        "href=\"" . $currpage . "&keywords=" . $keywords . "&page=" . $i .
                        "\">" . $i . "</a>";
                }
            }
        }
        if ($rrange < $numofpages) {
            $pagelinks .= "...";
        } else {
            $pagelinks .= "&nbsp;&nbsp;&nbsp;";
        }

        if (($numrows - ($limit * $page)) > 0) {
            $pagenext = $page + 1;
            $pagelinks .= "<a class=\"pagenextlink\" href=\"" . $currpage .
                "&keywords=" . $keywords . "&page=" . $pagenext . "\">NEXT &gt;</a>";
        } else {
            $pagelinks .= "<span class=\"current\">NEXT &gt;</span>";
        }
    } else {
        $pagelinks .= "<span class=\"current\">&lt; " .
            "PREV</span>&nbsp;&nbsp;";
        $pagelinks .= "<span class=\"current\"> " .
            "NEXT &gt;</span>&nbsp;&nbsp;";
    }
    $pagelinks .= "</div>";
    return $pagelinks;
}


function bbcode($data)
{
    $sql = "SELECT * FROM forum_bbcode";
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_array($result)) {
            $bbcode['tpl'][] =
                "/" . html_entity_decode($row['template'], ENT_QUOTES) . "/i";
            $bbcode['rep'][] =
                html_entity_decode($row['replacement'], ENT_QUOTES);
        }
        $data1 = preg_replace($bbcode['tpl'], $bbcode['rep'], $data);
        $count = 1;
        while (($data1 != $data) and ($count < 4)) {
            $count++;
            $data = $data1;
            $data1 = preg_replace($bbcode['tpl'], $bbcode['rep'], $data);
        }
    }

    return $data;
}

function paginate_general($limit = 4, $range, $query, $keywords, $cat_id)
{
    $sql = $query;


    $result = mysql_query($sql)
    or die(mysql_error());
    $row = mysql_num_rows($result);
    $numrows = $row;

    $pagelinks = "<div class=\"pagination\">";
    if ($numrows > $limit) {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $currpage = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
        $currpage = str_replace("&page=" . $page, "", $currpage);

        if ($page == 1) {
            $pagelinks .= "<span class=\"current\">&lt; PREV</span>";
        } else {
            $pageprev = $page - 1;
            $pagelinks .= "<a class=\"pageprevlink\" href=\"" . $currpage .
                "&keywords=" . $keywords . "&modelname=" . $cat_id . "&page=" . $pageprev . "\">&lt; PREV</a>";
        }

        $numofpages = ceil($numrows / $limit);
        $range = $range;
        if ($range == "" or $range == 0) $range = 7;
        $lrange = max(1, $page - (($range - 1) / 2));
        $rrange = min($numofpages, $page + (($range - 1) / 2));
        if (($rrange - $lrange) < ($range - 1)) {
            if ($lrange == 1) {
                $rrange = min($lrange + ($range - 1), $numofpages);
            } else {
                $lrange = max($rrange - ($range - 1), 0);
            }
        }

        if ($lrange > 1) {
            $pagelinks .= "..";
        } else {
            $pagelinks .= "&nbsp;&nbsp;";
        }
        for ($i = 1; $i <= $numofpages; $i++) {
            if ($i == $page) {
                $pagelinks .= "<span class=\"current\">$i</span>";
            } else {
                if ($lrange <= $i and $i <= $rrange) {
                    $pagelinks .= "<a class=\"pagenumlink\" " .
                        "href=\"" . $currpage . "&keywords=" . $keywords . "&modelname=" . $cat_id . "&page=" . $i .
                        "\">" . $i . "</a>";
                }
            }
        }
        if ($rrange < $numofpages) {
            $pagelinks .= "...";
        } else {
            $pagelinks .= "&nbsp;&nbsp;&nbsp;";
        }

        if (($numrows - ($limit * $page)) > 0) {
            $pagenext = $page + 1;
            $pagelinks .= "<a class=\"pagenextlink\" href=\"" . $currpage .
                "&keywords=" . $keywords . "&modelname=" . $cat_id . "&page=" . $pagenext . "\">NEXT &gt;</a>";
        } else {
            $pagelinks .= "<span class=\"current\">NEXT &gt;</span>";
        }
    } else {
        $pagelinks .= "<span class=\"current\">&lt; " .
            "PREV</span>&nbsp;&nbsp;";
        $pagelinks .= "<span class=\"current\"> " .
            "NEXT &gt;</span>&nbsp;&nbsp;";
    }
    $pagelinks .= "</div>";
    return $pagelinks;
}

function get_page_number($id, $post, $limit)
{

    $sql = "SELECT SQL_CALC_FOUND_ROWS " .
        "p.id, p.subject, p.body, p.date_posted, " .
        "p.date_updated, u.firstname as author, u.users_id as author_id, " .
        "u.signature as sig, c.count as postcount, " .
        "p.forum_id as forum_id, f.forum_moderator as 'mod', " .
        "p.update_id, u2.firstname as updated_by " .
        "FROM forum_forum f " .
        "JOIN forum_posts p " .
        "ON f.id = p.forum_id " .
        "JOIN forum_users u " .
        "ON u.users_id = p.author_id " .
        "LEFT JOIN forum_users u2 " .
        "ON u2.users_id = p.update_id " .
        "LEFT JOIN forum_postcount c " .
        "ON u.users_id = c.user_id " .
        "WHERE (p.topic_id = $id OR p.id = $id) " .
        "ORDER BY p.topic_id, p.date_posted";

    $r_count = mysql_query($sql);
    $total = mysql_num_rows($r_count);
    $pager = new Pagernumber();
    $page = $pager->getPagernumber($total, $limit, $id, $post);


    return $page;


}


function showTopicByUser($topicid, $showfull = TRUE)
{

    global $userid;
    global $limit;

    echo breadcrumb($topicid, "P");
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    if ($limit == "") $limit = 5;
    $start = ($page - 1) * $limit;

    echo topicReplyBar($topicid, getForumID($topicid), "right");
    echo "<br>";

    echo $sql = "SELECT SQL_CALC_FOUND_ROWS " .
        "p.id, p.subject, p.body, p.date_posted, " .
        "p.date_updated, u.firstname as author, u.users_id as author_id, " .
        "u.signature as sig, c.count as postcount, " .
        "p.forum_id as forum_id, f.forum_moderator as 'mod', " .
        "p.update_id, u2.firstname as updated_by " .
        "FROM forum_forum f " .
        "JOIN forum_posts p " .
        "ON f.id = p.forum_id " .
        "JOIN forum_users u " .
        "ON u.users_id = p.author_id " .
        "LEFT JOIN forum_users u2 " .
        "ON u2.users_id = p.update_id " .
        "LEFT JOIN forum_postcount c " .
        "ON u.users_id = c.user_id " .
        "WHERE (p.topic_id = $topicid OR p.id = $topicid) " .
        "ORDER BY p.topic_id DESC, p.date_posted WHERE author_id=" . $_SESSION['userid'] .
        "LIMIT $start,$limit";
    $result = mysql_query($sql)
    or die(mysql_error() . "<br>" . $sql);
    $pagelinks = paginate($limit);
    if (mysql_num_rows($result) == 0) {
        $msg = "There are currently no posts.  Would you " .
            "like to be the first person to create a thread?";
        $title = "No Posts...";
        $dest = "index.php?goto=forum&prod=compose&forumid=" . $forumid;
        $sev = "Info";
        $message = msgBox($msg, $title, $dest, $sev);
        echo $message;
    } else {
        echo "<table class=\"forumtable\" cellspacing=\"0\" ";
        echo "cellpadding=\"2\" width=100%><tr>";
        echo "<th class=\"author\">Author</th>";
        echo "<th class=\"post\">Post</th>";
        echo "</tr>";
        $rowclass = "";
        while ($row = mysql_fetch_array($result)) {
            $lastupdate = "";
            $editlink = "";
            $dellink = "";
            $replylink = "&nbsp;";
            $pcount = "";
            $pdate = "";
            $sig = "";
            if ($showfull) {
                $body = $row['body'];

                $replylink = "<a href=\"index.php?goto=forum&prod=compose&forumid=" .
                    $row['forum_id'] . "&topicid=$topicid&reid=" . $row['id'] .
                    "\" class=\"breadcrum\">REPLY</a>&nbsp;";


                if ($row['update_id'] > 0) {
                    $lastupdate = "<p class=\"smallNote\">Last updated: " .
                        $row['date_updated'] . " by " .
                        $row['updated_by'] . "</p>";
                }
                if (($userid == $row['author_id']) or
                    ($userid == $row['mod']) or
                    ($_SESSION['access_lvl'] > 2)) {
                    $editlink = "<a href=\"index.php?goto=forum&prod=compose&a=edit&post=" . $row['id'] .
                        "\" class=\"breadcrum\">EDIT</a>&nbsp;";
                    $dellink = "<a href=\"index.php?goto=forum&prod=transact-affirm&action=deletepost&" .
                        "id=" . $row['id'] .
                        "\" class=\"breadcrum\">DELETE</a>&nbsp;";
                }
                $pcount = "<br><span class=\"textsmall\">Posts: " .
                    ($row['postcount'] == "" ? "0" : $row['postcount']) . "</span>";
                $pdate = $row['date_posted'];
                $sig = ($row['sig'] != "" ? "<p class=\"sig\">" .
                        bbcode(nl2br($row['sig'])) : "") . "</p>";
            } else {
                $body = trimBody($body);
            }
            $rowclass = ($rowclass == "row1" ? "row2" : "row1");
            echo "<tr class=\"$rowclass\">";
            echo "<td class=\"author\">" . $row['author'];
            echo $pcount;
            echo "</td><td class=\"post\"><p>";
            if (isset($_SESSION['userid'])
                and ($_SESSION['last_login'] < $row['date_posted'])) {
                echo NEWPOST . " ";
            }
            if (isset($_GET['page'])) {
                $pagelink = "&page=" . $_GET['page'];
            } else {
                $pagelink = "";
            }
            echo "<a name=\"post" . $row['id'] .
                "\" href=\"index.php?goto=forum&prod=viewtopic&t=" . $topicid . $pagelink . "#post" .
                $row['id'] . "\" class=breadcrum>" . POSTLINK . "</a>";
            if (isset($row['subject'])) {
                echo " <strong>" . $row['subject'] . "</strong>";
            }
            echo "</p><p>" . bbcode(nl2br(htmlspecialchars($body))) . "</p>";
            echo $sig;
            echo $lastupdate;
            echo "</td></tr>";
            echo "<tr class=\"$rowclass\"><td class=\"authorfooter\">";
            echo $pdate . "</td><td class=\"threadfooter\">";
            echo $replylink;
            echo $editlink;
            echo $dellink;
            echo "</td></tr>\n";
        }
        echo "</table>";
        echo $pagelinks;
        echo "<p class=prod_txt3>" . NEWPOST . " = New Post&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo POSTLINK . " = Post link (use to bookmark)</p>";
    }
}


function createcountrycombo($CSelectedValue, $CComboName, $JS, $cssClass = "")
{
    $stCountry = "Afganistan:Albani:Algier:Andorra:Angola:Anguilla:Antigua:Antilles:Arabia:Argentina:Armenia:Aruba:Ascension:Australia:Austria:Bahrain:Bangladesh:Barbados:Belarus:Belgium:Belize:Benin:Bermuda:Bhutan:Bolivia:Botsuana:Brasil:Brunei:Bulgaria:Burkina Faso:Burundi:CANADA:Canal Islands:Caymay Islands:Chile:China:Columbia:Cook Islands:Costa Rica:Cote d lvoire:Cuba:Cyprus:Czech Republic:Denmark:Dominica:Dschibuti:Ecuador:Egypt:EL Salvador:Equadorguinea:Eritrea:Estland:Ethiopia:Falkland Islands:Fiji Islands:Finland:France:French Guayana:French Polynesia:Faroer:Gubun:Gambin:Georgien:Germany:Ghana:Gibraltar:Great Britain:Greece:Greenland:Grenanda:Guadeloupa:Guam:Guatemala:Guinea:Guinea-Bissau:Guyana:Haiti:Hondura:Hongkong:Hungary:Iceland:India:Indonesia:Irak:Iran:Ireland:Israel:Italy:Jamica:Japan:Jordan:Jugoslavia:Kambodscha:Kamerun:Kap Verda:Kasachstan:Katar:Kenia:Kirgisistan:Kiribati:Kongo:Korea:Kroatia:Kuwait:Laos:Latvia:Lebanon:Lesotho:Liechtenstein:Lethuania:Luxembourg:Lyberia:Lybia:Macau:Madagaskar:Malawi:Malaysia:Maldieves:Mali:Malta:Man Island:Mariana:Marshall Islands:Martinique:Mauretania:Mauritius:Mayotte:Maxedonia:Mexico:Mikronesia:Maldau Republic:Monaco:Mongolia:Montserral:Morocco:Mosambique:Myanmar:Namibia:Nauru:Nepal:Netherlands:New Zealand:Newkaledonia:Nicaragua:Niger:Nigeria:North Ireland:Norway:Oman:Palau:Panama:Papua:Paraguay:Peru:Peru:Poland:Portugal:Puerto Rico:Reunion:Ruanda:Rumania:Russia:Salomones:Sambia:Samoa:Samoa(US):San Marino:Sao Tome:Saudi Arabia:Senegal:Seychelles:Seychelles:Zimbabwe:Singapore:Slovakia:Slovenia:Somalia:South Africa:Spain:Sri Lanka:St.Helena:St.Kitts:St.Lucia:St.Pierre:St.Vincent:Sudan:Suriname:Swaziland:Sweden:Switzerland:Syria:Tazikistan:Taiwan:Tansania:Thailand:Togo:Tongo:Trinibad:Tschad:Tunesia:Turkey:Turkmenistan:Uganda:Ukraina:USA:Uruguay:Usbekistan:Vanuatu:Vatican City:Venezuela:Vietnam:Virgin Island(GB):Yemen:Zaire:Bahamas:Pakistan";
//echo "arrayvalue=".$stCountry[0]."<br>";
//echo "passedvalue=".$CSelectedValue;
//exit();
    $stCountry = split(":", $stCountry);
    echo "<Select Name=$CComboName id=$CComboName class=\"$cssClass\">";
    echo "<option value=''>$JS Select</option>";
    for ($i = 0; $i < sizeof($stCountry); $i++) {
        if ($CSelectedValue == $stCountry[$i]) {
            echo "<option value=\"$stCountry[$i]\" Selected>$stCountry[$i]</option>";
        } else {
            echo "<option value=\"$stCountry[$i]\">$stCountry[$i]</option>";
        }
    } // end of For loop
    echo "</Select>";
}

?>
