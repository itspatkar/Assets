#include<stdio.h>
#include<stdlib.h>
#include<stdbool.h>

struct node{
	int data;
	struct node *prev;
	struct node *next;
};

struct node *head = NULL;

// Counting Nodes -
int countNode(struct node *head){
	int count=0;
	if(head == NULL)
		return 0;
	else {
		struct node *ptr = NULL;
		ptr=head;
		while(ptr != NULL){
			count++;
			ptr = ptr->next;
		}
		return count;
	}
}

// Printing Nodes -
void printNode(struct node *head){
	if(head == NULL)
		printf("Linked List is empty!\n");
	else {
		struct node *ptr = head;
		printf("Data:");
		while(ptr != NULL){
			printf(" %d",ptr->data);
			ptr = ptr->next;
		}
		printf("\n");
	}
}

// Insert Node in Empty Linked List -
struct node* insertEmpty(struct node *head, int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->prev = NULL;
	temp->data = data;
	temp->next = NULL;

	return temp;
}

// Insert Node at Beggining -
struct node* insertBeg(struct node *head, int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->prev = NULL;
	temp->data = data;
	temp->next = head;
	head->prev = temp;

	return temp;
}

// Insert Node at End -
struct node* insertEnd(struct node *head, int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->prev = NULL;
	temp->data = data;
	temp->next = NULL;

	struct node *ptr = head;
	while(ptr->next != NULL)
		ptr = ptr->next;
	temp->prev = ptr;
	ptr->next = temp;

	return head;
}

// Inserting Node at Certain Position -
struct node* insertPos(struct node *head, int data, int pos){
	if(pos == 1)
		head = insertBeg(head,data);
	else {
		struct node *temp = malloc(sizeof(struct node));
		temp->prev = NULL;
		temp->data = data;
		temp->next = NULL;

		struct node *ptr = head;
		int count = 1;
		while(count != pos-1){
			ptr = ptr->next;
			count++;
		}
		/* Another Logic:
		while(pos != 1){
			temp = temp->next;
			pos--;
		}*/
		temp->prev = ptr;
		temp->next = ptr->next;
		ptr->next = temp;
		ptr->next->prev = temp;
	}

	return head;
}

// Deleting First Node -
struct node* deleteFirst(struct node *head){
	head = head->next;
	free(head->prev);
	head->prev = NULL;
	printf("First node deleted.\n");

	return head;
}

// Deleting Last Node -
void deleteLast(struct node *head){
	struct node *ptr = head;
	while(ptr->next->next != NULL)
		ptr = ptr->next;
	free(ptr->next);
	ptr->next = NULL;
	printf("Last node deleted.\n");
}

// Deleting Node at Certain Position -
struct node* deletePos(struct node *head, int pos){
	struct node *ptr = head;
	if(head == NULL)
		printf("Linked list is already empty!\n");
	else if(pos == 1){
		head = deleteFirst(head);
		printf("Node deleted.\n");
	}
	else {
		while(pos > 1){
			ptr = ptr->next;
			pos--;
		}
		if (ptr->next == NULL)
			deleteLast(head);
		else {
			ptr->prev->next = ptr->next;
			ptr->next->prev = ptr->prev;
			free(ptr);
		}
		/* struct node *ptr2 = ptr->prev;
		ptr2->next = ptr->next;
		ptr->next->prev = ptr2;
		free(ptr); */
		printf("Node deleted.\n");
	}

	return head;
}

// Deleting Entire Linked List -
struct node* deleteLinkedList(struct node *head){
	printf("Yet to implement!\n");

	return head;
}

// Reverse Linked List -
struct node* reverseLinkedList(struct node* head){
	struct node* ptr1 = head;
	struct node* ptr2 = ptr1->next;

	ptr1->next = NULL;
	ptr1->prev = ptr2;
	
	while(ptr2 != NULL){
		ptr2->prev = ptr2->next;
		ptr2->next = ptr1;
		ptr1 = ptr2;
		ptr2 = ptr2->prev;
	}
	head = ptr1;
	printf("Linked list reversed.\n");

	return head;
}

int main(){
	/* struct node *head = malloc(sizeof(struct node));
	head->prev = NULL;
	head->data = 10;
	head->next = NULL;*/

	int d, p, c, count;
	bool exit = false;

	head = insertEmpty(head,10);
	head = insertEnd(head,20);
	head = insertEnd(head,30);
	head = insertEnd(head,40);
	head = insertEnd(head,50);

	printf("Select Operation to perform :\n0. Exit\n1. Clear Screen\n2. Count Nodes\n3. Print Nodes\n4. Insert Node in Empty Linked List\n5. Insert Node at End\n6. Insert Node at Beginning\n7. Insert Node at Position\n8. Delete First Node\n9. Delete Last Node\n10. Delete Node at Position\n11. Delete Linked List\n12. Reverse Linked List\n");
	printf("_____________________________\n");
	
	while(!exit){
		printf("\nEnter Choice Number : ");
		scanf("%d",&c);

		switch(c){
			case 0:
				printf("Exiting...\n");
				exit = true;
				break;
			case 1:
				printf("Clearing screen...\n");
				system("clear");
				printf("Select Operation to perform :\n0. Exit\n1. Clear Screen\n2. Count Nodes\n3. Print Nodes\n4. Insert Node in Empty Linked List\n5. Insert Node at End\n6. Insert Node at Beginning\n7. Insert Node at Position\n8. Delete First Node\n9. Delete Last Node\n10. Delete Node at Position\n11. Delete Linked List\n12. Reverse Linked List\n");
				printf("_____________________________\n");
				break;
			case 2:
				count = countNode(head);
				if (count == 0)
					printf("Linked list is empty!\n");
				else
					printf("Nodes in Linked list = %d\n",count);
				break;
			case 3:
				printNode(head);
				break;
			case 4:
				printf("# Inserting Node in Empty Linked List:\n");
				printf("Enter Data: ");
				scanf("%d",&d);
				head = insertEmpty(head,d);
				break;
			case 5:
				printf("# Inserting Node at End:\n");
				printf("Enter Data: ");
				scanf("%d",&d);
				head = insertEnd(head,d);
				break;
			case 6:
				printf("# Inserting Node at Beginning:\n");
				printf("Enter Data: ");
				scanf("%d",&d);
				head = insertBeg(head,d);
				break;
			case 7:
				printf("# Inserting Node at Certain Position:\n");
				printf("Enter Data: ");
				scanf("%d",&d);
				printf("Enter Position: ");
				scanf("%d",&p);
				head = insertPos(head, d, p); // (head, data, position)
				break;
			case 8:
				printf("# Deleting First Node:\n");
				head = deleteFirst(head);
				break;
			case 9:
				printf("# Deleting Last Node:\n");
				deleteLast(head);
				break;
			case 10:
				printf("# Deleting Node at Certain Position:\n");
				printf("Enter Position: ");
				scanf("%d",&p);
				head = deletePos(head, p); // (head, position)
				break;
			case 11:
				printf("# Deleting Entire Linked List:\n");
				head = deleteLinkedList(head);
				break;
			case 12:
				printf("# Reverse Linked List:\n");
				head = reverseLinkedList(head);
				break;
			default:
				printf("Incorrect Choice!\n");
		}
	}

	return 0;
}
