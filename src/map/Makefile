
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

MAP_OBJ = map.o chrif.o clif.o pc.o status.o npc.o \
	npc_chat.o chat.o path.o itemdb.o mob.o script.o \
	storage.o skill.o atcommand.o battle.o battleground.o \
	intif.o trade.o party.o vending.o guild.o pet.o \
	log.o mail.o date.o unit.o homunculus.o mercenary.o quest.o instance.o \
	buyingstore.o searchstore.o duel.o pc_groups.o elemental.o cashshop.o channel.o
MAP_SQL_OBJ = $(MAP_OBJ:%=obj_sql/%) \
	obj_sql/mapreg_sql.o
MAP_H = map.h chrif.h clif.h pc.h status.h npc.h \
	chat.h itemdb.h mob.h script.h path.h \
	storage.h skill.h atcommand.h battle.h battleground.h \
	intif.h trade.h party.h vending.h guild.h pet.h \
	log.h mail.h date.h unit.h homunculus.h mercenary.h quest.h instance.h mapreg.h \
	buyingstore.h searchstore.h duel.h pc_groups.h elemental.h cashshop.h channel.h\
	../config/core.h ../config/renewal.h ../config/secure.h ../config/const.h \
	../config/classes/general.h

HAVE_MYSQL=yes
ifeq ($(HAVE_MYSQL),yes)
	SQL_DEPENDS=map-server_sql
else
	SQL_DEPENDS=needs_mysql
endif
ALL_DEPENDS=sql

HAVE_PCRE=yes
ifeq ($(HAVE_PCRE),yes)
	PCRE_CFLAGS=-DPCRE_SUPPORT 
else
	PCRE_CFLAGS=
endif



#####################################################################
.PHONY : all sql clean help

all: $(ALL_DEPENDS)

sql: $(SQL_DEPENDS)

clean:
	@echo "	CLEAN	map"
	@rm -rf *.o obj_txt obj_sql ../../map-server ../../map-server_sql

help:
	@echo "possible targets are 'sql' 'txt' 'all' 'clean' 'help'"
	@echo "'sql'   - map server (SQL version)"
	@echo "'all'   - builds all above targets"
	@echo "'clean' - cleans builds and objects"
	@echo "'help'  - outputs this message"

#####################################################################

needs_mysql:
	@echo "MySQL not found or disabled by the configure script"
	@exit 1

# object directories

obj_sql:
	@echo "	MKDIR	obj_sql"
	@-mkdir obj_sql

# executables

map-server_sql: obj_sql $(MAP_SQL_OBJ) ../common/obj_sql/common_sql.a ../common/obj_all/common.a
	@echo "	LD	$@"
	@gcc  -march=i686 -L/usr/lib -lpthread -o ../../map-server_sql $(MAP_SQL_OBJ) ../common/obj_sql/common_sql.a ../common/obj_all/common.a $(MT19937AR_OBJ) $(LIBCONFIG_OBJ) -lpcre -lpthread -lpthread -lpthread -lpthread -lpthread -lpthread -lpthread -lrt -lm -lz  -ldl -lpcre -rdynamic -L/usr/lib/mysql -lmysqlclient -lz -lcrypt -lnsl -lm -L/usr/lib -lssl -lcrypto

# map object files

obj_sql/%.o: %.c $(MAP_H) $(COMMON_H)  $(MT19937AR_H) $(LIBCONFIG_H)
	@echo "	CC	$<"
	@gcc -g -O2 -DMAXCONN=16384 -pipe -ffast-math -Wall -march=i686 -DHAS_TLS -Wno-switch -fno-strict-aliasing -DHAVE_SETRLIMIT -DHAVE_STRNLEN  -Wno-pointer-sign -DHAVE_MONOTONIC_CLOCK $(MT19937AR_INCLUDE) $(LIBCONFIG_INCLUDE) $(PCRE_CFLAGS) -I/usr/include/mysql  -I../common -I/usr/include -c $(OUTPUT_OPTION) $<

# missing object files
../common/obj_all/common.a:
	@$(MAKE) -C ../common sql

../common/obj_sql/common_sql.a:
	@$(MAKE) -C ../common sql

MT19937AR_OBJ:
	@$(MAKE) -C ../../3rdparty/mt19937ar

LIBCONFIG_OBJ:
	@$(MAKE) -C ../../3rdparty/libconfig
