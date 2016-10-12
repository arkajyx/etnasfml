#include "../include/common/config.hpp"
#include <SFML/Network.hpp>
#include <stdbool.h>
#include <stdio.h>
#include <iostream>
#include <vector>

using namespace sf;
using namespace std;

vector<TcpSocket*> clients;

void	receive_packet(TcpSocket *client)
{
  char		msg[2048];
  size_t	received;

  while (client->receive(msg, 2048, received) == Socket::Done)
    {
      printf("%s\n", msg);
    }
  printf("Client disconnected.\n");
}

bool	create_server(TcpListener *server)
{
  if (server->listen(SERVER_PORT) != Socket::Done)
      return (false);
  return (true);
}

bool	start_server()
{
  TcpListener 	server;
  TcpSocket	client;

  if (create_server(&server))
    {
      while (server.accept(client) == Socket::Done)
	{
	  clients.push_back(&client);
	  Thread thread(&receive_packet, &client);
	  thread.launch();
	  printf("New client accepted\n");
	}
      printf("Sortie de boucle\n");
    }
  else
    return (false);
  return (true);
}

int	main()
{
  if (start_server() == false)
    printf("There's a problem...\n");
  return (0);
}
