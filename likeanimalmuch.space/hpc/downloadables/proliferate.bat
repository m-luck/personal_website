rem Author: Michael Lukiman
rem Purpose: open apps, and delete the batch file for cleanliness. 
rem Use case: download batch from web page, run batch. closest to running third parties from webpage as possible in Win. 
rem Specific affiliation: for use in Holodeck VR project; NYU-X labs, High Performance Computing, and Research Technology. 

rem turn off background terminal
@echo off


rem ---------------------------
rem apps here

cd "C:\Program Files\Google\Chrome\Application"
start chrome.exe

cd "C:\Program Files\Mozilla Firefox"
start firefox.exe

cd "C:\Program Files\obs-studio\bin\64bit"
start obs64.exe

rem ---------------------------

(goto) 2>nul & del "%~f0"