@echo off 
taskkill /IM firefox.exe
taskkill /IM chrome.exe
taskkill /IM obs64.exe

(goto) 2>nul & del "%~f0"