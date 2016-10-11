CC		=	g++
NAME	=	a.out
SRC		=	*.cpp
OBJ		=	$(SRC:%.c=%.o)
RM		=	rm -f
LDFLAGS	=	-lsfml-graphics -lsfml-window -lsfml-system -lsfml-network -lsfml-audio

$(NAME)	:	$(OBJ)
		$(CC) $(OBJ) -o $(NAME) $(LDFLAGS)

all	:	$(NAME)

clean	:
		$(RM) $(OBJ)

fclean	:	clean
		$(RM) $(NAME)

re	:	fclean all
