----------------------------------------------------------------------------------
-- Company: 
-- Engineer: 
-- 
-- Create Date:    13:20:09 03/25/2009 
-- Design Name: 
-- Module Name:    xor - Behavioral 
-- Project Name: 
-- Target Devices: 
-- Tool versions: 
-- Description: 
--
-- Dependencies: 
--
-- Revision: 
-- Revision 0.01 - File Created
-- Additional Comments: 
--
----------------------------------------------------------------------------------
library IEEE;
use IEEE.STD_LOGIC_1164.ALL;

---- Uncomment the following library declaration if instantiating
---- any Xilinx primitives in this code.
--library UNISIM;
--use UNISIM.VComponents.all;

entity xorTest is
    Port ( SW1 : in  STD_LOGIC;
           SW2 : in  STD_LOGIC;
           CORN : out  STD_LOGIC);
end xorTest;

architecture LogicalFunction of xorTest is

begin

CORN <= (SW1 AND NOT SW2) OR (NOT SW1 AND SW2);

end LogicalFunction;