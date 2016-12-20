#!/bin/bash

logFile1=$1
logFile=$(basename "$logFile1")
#echo $logFile
logDir=$(realpath "$logFile1")
logDir=$(dirname "$logDir")
#echo $logDir
#echo $SHELL


numDays=($2*24*60)
x=$(($numDays*60))   #convert the number of days to epoch
>LogReport.txt
#Heading of LogReport.txt
echo "" >> LogReport.txt
echo "Rosa M valdez" >> LogReport.txt
echo "IT-340" >> LogReport.txt
echo "Final Project" >> LogReport.txt
echo "" >> LogReport.txt
echo "####################" >> LogReport.txt
echo "Notification Report" >> LogReport.txt
echo "Days:" $2 "days" >> LogReport.txt
echo "####################" >> LogReport.txt


if [ "$logDir" = "/var/log/apache2" ] && [ "$logFile" = "error.log" ]; then
	# this line get the timestamp in seconds of last line of your logfile
	last=$(tail -n1 $logFile|awk -F'[][]' '{ gsub(/\//," ");"date +%s -d \""$2"\""|getline d; print d;}' )

	#this awk will give you lines you needs:
	awk -F'[][]' -v last=$last -v x=$x '{ gsub(/\//," "); "date +%s -d \""$2"\""|getline d; if (last-d<=x)print $0 }' $logFile > $logDays.txt

	#echo "This is the end of the script"

	tail -n +2 "$logDays.txt" > "$logDays.tmp" && mv "$logDays.tmp" "$logDays.txt"

	#cat $logDays.txt

	error=$(egrep -c -i  'Error|ERROR|EE|error' $logDays.txt)
	#error=$(sed 's/Error/Error\n/gI'  $logDays.txt | grep -c -i "Error")
	warning=$(sed 's/Warning/Warning\n/gI'  $logDays.txt | grep -c -i "Warning")
	critical=$(egrep -c -i  'Critical|CRITICAL|critical' $logDays.txt)

	#grep -i "warning" $logDays.txt

	#echo "This is Error 1:" $error1
	echo "" >> LogReport.txt
	echo "**************************************" >> LogReport.txt
	echo "This is the number of Errors:" $error >> LogReport.txt
	echo "**************************************" >> LogReport.txt
	echo "This is the number of warnings: " $warning >> LogReport.txt
	echo "**************************************" >> LogReport.txt
	echo "This is the number of Criticals: " $critical >> LogReport.txt
	echo "**************************************" >> LogReport.txt
	echo "" >> LogReport.txt

	#cat $logDays.txt

	#fileName=$logDays.txt
	#declare -a myArray
	#myArray=('cat, "$fileName"')
	#readarray myArray < $fileName

	#let i=0
	#while((${#myArray[@]}>i)); do
	# printf "${myArray[i++]}\n"
	#done
else
	tail -n $2 "$logFile"> "$logDays.txt"
	error=$(egrep -c -i  'Error|ERROR|EE|error' $logDays.txt)
        #error=$(sed 's/Error/Error\n/gI'  $logDays.txt | grep -c -i "Error")
        warning=$(sed 's/Warning/Warning\n/gI'  $logDays.txt | grep -c -i "Warning")
        critical=$(egrep -c -i  'Critical|CRITICAL|critical' $logDays.txt)

        #grep -i "warning" $logDays.txt

        #echo "This is Error 1:" $error1
        echo "" >> LogReport.txt
        echo "**************************************" >> LogReport.txt
        echo "This is the number of Errors:" $error >> LogReport.txt
        echo "**************************************" >> LogReport.txt
        echo "This is the number of warnings: " $warning >> LogReport.txt
        echo "**************************************" >> LogReport.txt
        echo "This is the number of Criticals: " $critical >> LogReport.txt
        echo "**************************************" >> LogReport.txt
        echo "" >> LogReport.txt

fi
