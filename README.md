# DataBoard

A project created for [Offline Technologies](https://www.offlinetechnologies.gr) Company.

Table of Contents
=================
   * [Installation](#installation)
      * [Requirements](#requirements)
      * [Instructions](#instructions)
   * [Description](#description)
       * [Overview](#overview)
       * [Technologies](#technologies)
       * [Developers](#developers)
   * [Database](#database)
       * [Tables](#tables)
       * [Schema](#schema)
   * [Graphical User Interface](#graphical-user-interface)


# Installation

## Requirements

* Apache2
* Mysql Server
* php

## Instructions

* Clone the project to a folder <br/>
  `$ git clone https://github.com/alexoiik/DataBoard.git`

 * Make sure the folder is accessible from Apache Server. You may need to specify the following settings.

 * You should create in Mysql the database named 'databoard' and load the data from the schema.sql file into this database.

 * You should make the file lib/db_upass.php which will contain:
```
    <?php
        $DB_PASS = 'password';
        $DB_USER = 'username';
    ?>
```


# Description

## Overview

DataBoard is a Dashboard that offers data and comprehensive information about videos. DataBoard provides a holistic overview of video performance, including users, views and durations.

Discover the Features: <br/>
  - ***Recent Data:*** <br/>
      Stay in the loop with the latest updates. Our Recent Data section offers a snapshot of the most recent activities, ensuring you're always up-to-date with the freshest information.
  - ***Top Videos:*** <br/>
      Explore the Top Videos section to see which content is making waves. Gain valuable insights about which videos get the most views.
  - ***Analytics:*** <br/>
      Our Analytics section provides a deep dive into recent users, statistics of video durations, and also characteristics of views.

## Technologies

* Html/css
* JavaScript
* MySQL
* php

## Developers

- Alexandros Oikonomou
- Kostas Kyriakos Batsios

# Database

## Tables

  - admins:
      - admin_id
      - username
      - password
  - users
      - id
      - username
  - videos
      - id
      - title
      - duration
  - view_records
      - user
      - video
      - begin
      - end
  - final_records
      - user_id
      - user_name
      - video_id
      - video_title
      - video_duration
      - total_view_time
      - last_change

## Schema

Check out the database schema [here](img/DataBoard_DB.png).

# Graphical User Interface

![Dashboard](/img/dashboard.png?raw=true "Dashboard") 
