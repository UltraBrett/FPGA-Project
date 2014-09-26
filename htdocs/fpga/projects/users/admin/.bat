@echo off


echo "---------------------------------"
echo "Making Temporary Directory"

REM Make directory called temporary
mkdir .\temp
REM Make directory in temp called xst
mkdir .\temp\xst

REM Set permission to the temp and xst directory
cacls .\temp /t /e /g Everyone:f

REM Copy all contents from original xst directory to the new directory in temp 
xcopy .\xst .\temp\xst /e
REM Copy all file from original directory to temp
copy .\* .\temp
REM Change current working directory to temp
cd .\temp
REM Set permissions to the xst folder
cacls .\xst /t /e /g Everyone:f


echo "---------------------------------"
echo "Synthesizing VHDL and UCF"

REM Commands required to synthesis the VHDL and UCF files to the bit file
C:\Xilinx\13.3\ISE_DS\ISE\bin\nt\xst -intstyle ise -ifn ".xst" -ofn ".syr"
C:\Xilinx\13.3\ISE_DS\ISE\bin\nt\ngdbuild -intstyle ise -dd _ngo -nt timestamp -uc .ucf -p xc6slx45-csg324-3 ".ngc" .ngd  
C:\Xilinx\13.3\ISE_DS\ISE\bin\nt\map -intstyle ise -p xc6slx45-csg324-3 -w -logic_opt off -ol high -t 1 -xt 0 -register_duplication off -r 4 -global_opt off -mt off -ir off -pr off -lc off -power off -o _map.ncd .ngd .pcf 
C:\Xilinx\13.3\ISE_DS\ISE\bin\nt\par -w -intstyle ise -ol high -mt off _map.ncd .ncd .pcf 
C:\Xilinx\13.3\ISE_DS\ISE\bin\nt\trce -intstyle ise -v 3 -s 3 -n 3 -fastpaths -xml .twx .ncd -o .twr .pcf -ucf .ucf 
C:\Xilinx\13.3\ISE_DS\ISE\bin\nt\bitgen -intstyle ise -f .ut .ncd 


echo "---------------------------------"
echo "Creating commands file for programming"

REM Commands echoed to the commands file used for programming the board
echo setMode -bscan >> commands.cmd
echo setCable -p auto >> commands.cmd
echo identify >> commands.cmd
echo assignfile -p 1 -file .bit >> commands.cmd
echo program -p 1 >> commands.cmd
echo quit >> commands.cmd


echo "---------------------------------"
echo "Programming FPGA"

REM Command required to program the FPGA
C:\Xilinx\13.3\ISE_DS\ISE\bin\nt\impact -batch commands.cmd


echo "---------------------------------"
echo "Removing Temporary Directory"

REM Change working directory to this directories parent
cd ..
REM Delete the temporary directory
rmdir /S /Q .\temp



