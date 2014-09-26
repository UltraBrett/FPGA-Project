library IEEE;
use IEEE.STD_LOGIC_1164.ALL;

entity LEDTEST2 is
    Port ( LED0 : out  STD_LOGIC;
           LED1 : out  STD_LOGIC;
           LED2 : out  STD_LOGIC;
           LED3 : out  STD_LOGIC;
           LED4 : out  STD_LOGIC;
           LED5 : out  STD_LOGIC;
           LED6 : out  STD_LOGIC;
           LED7 : out  STD_LOGIC;
           clk : in  STD_LOGIC);
end LEDTEST2;

architecture Behavioral of LEDTEST2 is
	
	-- Increase/decrease value to change the rate that the LEDs blink
	constant CNT_MAX : integer := 10000000;
	
	signal blink : std_logic := '1';
	signal cnt : integer :=1;

begin
	process(clk)
	begin
	
			if (clk='1' and clk'event) then
			  if cnt = CNT_MAX then
					cnt <= 0;
					blink <= not blink;
			  else
					cnt <= cnt + 1;
			  end if;
			end if;
			
	end process;
	
	LED0 <= blink;
	LED1 <= blink;
	LED2 <= blink;
	LED3 <= blink;
	LED4 <= blink;
	LED5 <= blink;
	LED6 <= blink;
	LED7 <= blink;
	
end Behavioral;

