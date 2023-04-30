#!/bin/bash


code(){
	while read line; do
		echo $line
	done < file
}

run(){
	read -p ">> " cmd

	if [[ $cmd == "exit" ]]; then
		rm -f a.out file code.cpp
		exit 0
	fi

	if [[ $cmd == "clear" ]]; then
		clear
		return 0
	fi

	if [[ $cmd == "reset" ]]; then
		rm -f a.out file code.cpp
		clear
		return 0
	fi

	echo $cmd >> file
	echo -e "#include<bits/stdc++.h>\nusing namespace std;\nint main(){\n$(code)\nreturn 0;\n}" > code.cpp

	g++ code.cpp
	./a.out

	sed -i 's/cout/\/\/cout/g' file
}

echo "Pseudo C++ Interpreter 1.0"
echo -e "Type \"clear\" to clear the screen, \"reset\" to reset the code, \"exit\" to exit the interpreter."
echo " " > file

while true; do
	run
done
