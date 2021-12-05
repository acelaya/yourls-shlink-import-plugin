# YOURLS Shlink import plugin

A YOURLS plugin that you need to install if you want to import your links and clicks into [Shlink](https://shlink.io).

## Installation

* Download this folder and place it inside `user/plugins`, in your YOURLS installation.
* Go to your YOURLS admin dashboard and enable the plugin.
* From Shlink, run `shlink short-url:import yourls`, and introduce the requested data.

## Limitations

At the moment, this plugin does not support pagination, meaning, all your links will be fetched in one go.

If you have a lot of links, or some link with a lot of visits, that could result in an error either on YOURLS or Shlink.

The behavior will depend on how much memory your instances are allowed to use.
