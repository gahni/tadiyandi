
MT19937AR_OBJ = mt19937ar.o
MT19937AR_H = mt19937ar.h



#####################################################################
.PHONY : all clean help

all: $(MT19937AR_OBJ)

clean:	
	@echo "	CLEAN	mt19937ar"
	@rm -rf *.o

help:
	@echo "possible targets are 'all' 'clean' 'help'"
	@echo "'all'    - builds $(MT19937AR_OBJ)"
	@echo "'clean'  - deletes $(MT19937AR_OBJ)"
	@echo "'help'   - outputs this message"

#####################################################################

%.o: %.c $(MT19937AR_H)
	@echo "	CC	$<"
	@gcc -g -O2 -DMAXCONN=16384 -pipe -ffast-math -Wall -march=i686 -DHAS_TLS -Wno-switch -fno-strict-aliasing -DHAVE_SETRLIMIT -DHAVE_STRNLEN  -Wno-pointer-sign -DHAVE_MONOTONIC_CLOCK  -I../common -I/usr/include -c $(OUTPUT_OPTION) $<
