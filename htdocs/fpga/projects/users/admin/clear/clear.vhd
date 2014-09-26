library IEEE;
use IEEE.STD_LOGIC_1164.ALL;

entity clear is
    Port ( LED0 : out  STD_LOGIC;
           LED1 : out  STD_LOGIC;
           LED2 : out  STD_LOGIC;
           LED3 : out  STD_LOGIC;
           LED4 : out  STD_LOGIC;
           LED5 : out  STD_LOGIC;
           LED6 : out  STD_LOGIC;
           LED7 : out  STD_LOGIC;
           clk : in  STD_LOGIC);
end clear;

architecture Behavioral of clear is
	
begin
	
	
	LED0 <= '0';
	LED1 <= '0';
	LED2 <= '0';
	LED3 <= '0';
	LED4 <= '0';
	LED5 <= '0';
	LED6 <= '0';
	LED7 <= '0';
	
end Behavioral;

