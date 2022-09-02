#include<stdio.h>
#include<stdlib.h>

struct node{
	int data;
	struct node *link;
};

int main(int argc, char const *argv[]){
	// 1st node -
	struct node *head = NULL;
	head = (struct node *)malloc(sizeof(struct node));
	head->data = 10;
	head->link = NULL;
	printf("%d\n", head->data);

	// 2nd node -
	struct node *current = malloc(sizeof(struct node));
	current->data = 20;
	current->link = NULL;
	head->link = current;
	printf("%d\n", current->data);

	// 3rd node (two methods for it) -
	/* method 1 (but it cant be used as it creates unnecessory pointers) -
	struct node *current2 = malloc(sizeof(struct node));
	current2->data = 30;
	current2->link = NULL;
	current->link = current2;
	printf("%d\n", current2->data); */
	// method 2 -
	current = malloc(sizeof(struct node));
	current->data = 30;
	current->link = NULL;
	head->link->link = current;
	printf("%d\n", current->data);
	
	return 0;
}
