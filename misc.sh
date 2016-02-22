#!/bin/sh

# block smtp so emails aren't sent accidentally
sudo ufw deny out 25;
