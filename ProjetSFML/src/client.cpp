#include "../include/common/config.hpp"
#include <SFML/Network.hpp>
#include <iostream>
#include <stdbool.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

using namespace sf;
using namespace std;

IpAddress hostadress = SERVER_IP;

bool	create_client(TcpSocket *client)
{
  Socket::Status status = client->connect(hostadress, SERVER_PORT);
  if (status != Socket::Done)
    return (false);
  return (true);
}

bool	start_client()
{
  TcpSocket	client;
  char		msg[2048];

  if (create_client(&client))
    {
      while (strcmp(msg, "quit") != 0)
	{
	  cin >> msg;
	  if (strcmp(msg, "quit") != 0)
	    {
	      if (client.send(msg, 2048) != Socket::Done)
		return (false);
	    }
	  else break;
	}
    }
  else
    return (false);
  return (true);
}

int	main()
{
  if (start_client() == false)
    printf("There's a problem...\n");
  return (0);
}
