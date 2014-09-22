
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

LOGIN_OBJ = login.o
LOGIN_SQL_OBJ = $(LOGIN_OBJ:%=obj_sql/%) \
	obj_sql/account_sql.o obj_sql/ipban_sql.o obj_sql/loginlog_sql.o
LOGIN_H = login.h account.h ipban.h loginlog.h

HAVE_MYSQL=yes
ifeq ($(HAVE_MYSQL),yes)
	SQL_DEPENDS=login-server_sql
else
	SQL_DEPENDS=needs_mysql
endif
ALL_DEPENDS= sql



#####################################################################
.PHONY :all sql clean help

all: $(ALL_DEPENDS)

sql: $(SQL_DEPENDS)

clean:
	@echo "	CLEAN	login"
	@rm -rf *.o obj_sql ../../login-server_sql

help:
	@echo "possible targets are 'sql' 'all' 'clean' 'help'"
	@echo "'sql'       - login server (SQL version)"
	@echo "'all'       - builds all above targets"
	@echo "'clean'     - cleans builds and objects"
	@echo "'help'      - outputs this message"

#####################################################################

needs_mysql:
	@echo "MySQL not found or disabled by the configure script"
	@exit 1

# object directories

obj_sql:
	@echo "	MKDIR	obj_sql"
	@-mkdir obj_sql

#executables

login-server_sql: obj_sql $(LOGIN_SQL_OBJ) ../common/obj_sql/common_sql.a ../common/obj_all/common.a  $(MT19937AR_OBJ)
	@echo "	LD	$@"
	@gcc  -march=i686 -L/usr/lib -lpthread -o ../../login-server_sql $(LOGIN_SQL_OBJ) ../common/obj_sql/common_sql.a ../common/obj_all/common.a $(MT19937AR_OBJ) $(LIBCONFIG_OBJ) -lpcre -lpthread -lpthread -lpthread -lpthread -lpthread -lpthread -lpthread -lrt -lm -lz  -ldl -rdynamic -L/usr/lib/mysql -lmysqlclient -lz -lcrypt -lnsl -lm -L/usr/lib -lssl -lcrypto
	    

# login object files

obj_sql/%.o: %.c $(LOGIN_H) $(COMMON_H) $(MT19937AR_H) $(LIBCONFIG_H)
	@echo "	CC	$<"
	@gcc -g -O2 -DMAXCONN=16384 -pipe -ffast-math -Wall -march=i686 -DHAS_TLS -Wno-switch -fno-strict-aliasing -DHAVE_SETRLIMIT -DHAVE_STRNLEN  -Wno-pointer-sign -DHAVE_MONOTONIC_CLOCK $(MT19937AR_INCLUDE) $(LIBCONFIG_INCLUDE) -DWITH_SQL -I/usr/include/mysql  -I../common -I/usr/include -c $(OUTPUT_OPTION) $<

# missing object files
../common/obj_all/common.a:
	@$(MAKE) -C ../common sql

../common/obj_sql/common_sql.a:
	@$(MAKE) -C ../common sql

MT19937AR_OBJ:
	@$(MAKE) -C ../../3rdparty/mt19937ar

LIBCONFIG_OBJ:
	@$(MAKE) -C ../../3rdparty/libconfig
