#include<stdio.h>
#include<stdlib.h>

struct node{
	int data;
	struct node *next;
};

struct node *head = NULL;
struct node *current = NULL;

int main(int argc, char const *argv[]){
	// 1st node -
	head = (struct node *)malloc(sizeof(struct node));
	head->data = 10;
	head->next = NULL;
	printf("%d\n", head->data);

	// 2nd node -
	current = malloc(sizeof(struct node));
	current->data = 20;
	current->next = NULL;
	head->next = current;
	printf("%d\n", current->data);

	// 3rd node (two methods for it) -
	/* method 1 (but it cant be used as it creates unnecessory pointers) -
	struct node *current2 = malloc(sizeof(struct node));
	current2->data = 30;
	current2->next = NULL;
	current->next = current2;
	printf("%d\n", current2->data); */
	// method 2 -
	current = malloc(sizeof(struct node));
	current->data = 30;
	current->next = NULL;
	head->next->next = current;
	printf("%d\n", current->data);
	
	return 0;
}
