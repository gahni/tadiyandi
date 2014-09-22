
COMMON_H = $(shell ls ../common/*.h)

MT19937AR_OBJ = ../../3rdparty/mt19937ar/mt19937ar.o
MT19937AR_H = ../../3rdparty/mt19937ar/mt19937ar.h
MT19937AR_INCLUDE = -I../../3rdparty/mt19937ar

LIBCONFIG_OBJ = ../../3rdparty/libconfig/libconfig.o ../../3rdparty/libconfig/grammar.o \
	../../3rdparty/libconfig/scanctx.o ../../3rdparty/libconfig/scanner.o ../../3rdparty/libconfig/strbuf.o
LIBCONFIG_H = ../../3rdparty/libconfig/libconfig.h ../../3rdparty/libconfig/grammar.h \
	../../3rdparty/libconfig/parsectx.h ../../3rdparty/libconfig/scanctx.h ../../3rdparty/libconfig/scanner.h \
	../../3rdparty/libconfig/strbuf.h ../../3rdparty/libconfig/wincompat.h
LIBCONFIG_INCLUDE = -I../../3rdparty/libconfig

COMMON_SQL_OBJ = ../common/obj_sql/sql.o
COMMON_H = ../common/sql.h

CHAR_OBJ = obj_sql/char.o obj_sql/inter.o obj_sql/int_party.o obj_sql/int_guild.o \
	obj_sql/int_storage.o obj_sql/int_pet.o obj_sql/int_homun.o obj_sql/int_mail.o obj_sql/int_auction.o obj_sql/int_quest.o obj_sql/int_mercenary.o obj_sql/int_elemental.o
CHAR_H = char.h inter.h int_party.h int_guild.h int_storage.h int_pet.h int_homun.h int_mail.h int_auction.h int_quest.h int_mercenary.h int_elemental.h

HAVE_MYSQL=yes
ifeq ($(HAVE_MYSQL),yes)	
	SQL_DEPENDS=char-server_sql
else
	SQL_DEPENDS=needs_mysql
endif
ALL_DEPENDS=sql



#####################################################################
.PHONY : all sql clean help

all: $(ALL_DEPENDS)

sql: $(SQL_DEPENDS)

clean:
	@echo "	CLEAN	char"
	@rm -rf *.o obj_sql ../../char-server_sql

help:
	@echo "possible targets are 'sql' 'all' 'clean' 'help'"
	@echo "'sql'  		  - char server (SQL version)"
	@echo "'all'              - builds all above targets"
	@echo "'clean'            - cleans builds and objects"
	@echo "'help'             - outputs this message"

#####################################################################

char-server_sql: obj_sql $(CHAR_OBJ) ../common/obj_sql/common_sql.a ../common/obj_all/common.a $(MT19937AR_OBJ)
	@echo "	LD	$@"
	@gcc  -march=i686 -L/usr/lib -lpthread -o ../../char-server_sql $(CHAR_OBJ) ../common/obj_sql/common_sql.a ../common/obj_all/common.a $(MT19937AR_OBJ) $(LIBCONFIG_OBJ) -lpcre -lpthread -lpthread -lpthread -lpthread -lpthread -lpthread -lpthread -lrt -lm -lz  -ldl -rdynamic -L/usr/lib/mysql -lmysqlclient -lz -lcrypt -lnsl -lm -L/usr/lib -lssl -lcrypto

needs_mysql:
	@echo "MySQL not found or disabled by the configure script"
	@exit 1

obj_sql:
	@echo "	MKDIR	obj_sql"
	@-mkdir obj_sql

obj_sql/%.o: %.c $(CHAR_H) $(COMMON_H) $(COMMON_SQL_H) $(MT19937AR_H) $(LIBCONFIG_H)
	@echo "	CC	$<"
	@gcc -g -O2 -DMAXCONN=16384 -pipe -ffast-math -Wall -march=i686 -DHAS_TLS -Wno-switch -fno-strict-aliasing -DHAVE_SETRLIMIT -DHAVE_STRNLEN  -Wno-pointer-sign -DHAVE_MONOTONIC_CLOCK $(MT19937AR_INCLUDE) $(LIBCONFIG_INCLUDE) -I/usr/include/mysql  -I../common -I/usr/include -c $(OUTPUT_OPTION) $<

# missing object files
../common/obj_all/common.a:
	@$(MAKE) -C ../common sql

../common/obj_sql/common_sql.a:
	@$(MAKE) -C ../common sql

MT19937AR_OBJ:
	@$(MAKE) -C ../../3rdparty/mt19937ar

LIBCONFIG_OBJ:
	@$(MAKE) -C ../../3rdparty/libconfig
