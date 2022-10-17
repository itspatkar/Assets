#include<stdio.h>
#include<stdlib.h>
#include<stdbool.h>

struct node{
	int data;
	struct node *next;
};

struct node *tail = NULL;

// Traversing Linked List : Printing data -
void printData(struct node *tail){
	if(tail == NULL)
		printf("Linked list is empty!\n");
	else {
		struct node *ptr = tail->next;
		printf("Data:");
		do {
			printf(" %d",ptr->data);
			ptr = ptr->next;
		} while(ptr != tail->next);
		printf("\n");
	}
}

// Insert Node in Empty Linked List -
struct node* insertEmpty(int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->data = data;
	temp->next = temp;

	return temp;
}

// Inserting Node at Beggining -
struct node* insertBeg(struct node *tail, int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;

	temp->next = tail->next;
	tail->next = temp;

	return tail;
}

// Insert Node at End -
struct node* insertEnd(struct node *tail, int data){
	struct node *temp = malloc(sizeof(struct node));
	temp->data = data;
	temp->next = NULL;

	temp->next = tail->next;
	tail->next = temp;
	tail = tail->next;

	return tail;
}

// Inserting Node at Certain Position -
struct node* insertPos(struct node *tail, int data, int pos){
	if(pos == 1)
		tail = insertBeg(tail,data);
	else {
		struct node *temp = malloc(sizeof(struct node));
		temp->data = data;
		temp->next = NULL;

		struct node *ptr = tail->next;
		int count = 1;
		while(count != pos-1){
			ptr = ptr->next;
			count++;
		}
		temp->next = ptr->next;
		ptr->next = temp;
	}

	return tail;
}

// Deleting First Node -
struct node* deleteFirst(struct node *tail){
	if(tail == NULL)
		printf("Linked list is empty!\n");
	else if(tail->next == tail){
		free(tail);
		tail = NULL;
		printf("Last node deleted.\n");
	} else{
		struct node* ptr = tail->next;
		tail->next = tail->next->next;
		free(ptr);
		ptr = NULL;
		printf("First node deleted.\n");
	}

	return tail;
}

// Deleting Last Node -
struct node* deleteLast(struct node *tail){
	if(tail == NULL)
		printf("Linked list is empty!\n");
	else if(tail->next == tail){
		free(tail);
		tail = NULL;
		printf("Last node deleted.\n");
	} else{
		struct node* ptr = tail->next;
		while(ptr->next != tail)
			ptr = ptr->next;
		ptr->next = tail->next;
		free(tail);
		tail = ptr;
		printf("Last node deleted.\n");
	}

	return tail;
}

int main(){
	int d, p, c, count;
	bool exit = false;

	tail = insertEmpty(10);
	tail = insertEnd(tail,20);
	tail = insertEnd(tail,30);
	tail = insertEnd(tail,40);

	printf("Select Operation to perform :\n0. Exit\n1. Clear Screen\n2. Print Nodes\n3. Insert Node in Empty Linked List\n4. Insert Node at Beginning\n5. Insert Node at End\n6. Insert Node at Position\n7. Delete First Node\n8. Delete Last Node\n9. Delete Node at Position\n10. Delete Linked List\n11. Reverse Linked List\n");
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
				printf("Select Operation to perform :\n0. Exit\n1. Clear Screen\n2. Print Nodes\n3. Insert Node in Empty Linked List\n4. Insert Node at Beginning\n5. Insert Node at End\n6. Insert Node at Position\n7. Delete First Node\n8. Delete Last Node\n9. Delete Node at Position\n10. Delete Linked List\n11. Reverse Linked List\n");
				printf("_____________________________\n");
				break;
			case 2:
				printData(tail);
				break;
			case 3:
				printf("# Inserting Node in Empty Linked List:\n");
				printf("Enter Data: ");
				scanf("%d",&d);
				tail = insertEmpty(d);
				break;
			case 4:
				printf("# Inserting Node at Beginning:\n");
				printf("Enter Data: ");
				scanf("%d",&d);
				tail = insertBeg(tail,d);
				break;
			case 5:
				printf("# Inserting Node at End:\n");
				printf("Enter Data: ");
				scanf("%d",&d);
				tail = insertEnd(tail,d);
				break;
			case 6:
				printf("# Inserting Node at Certain Position:\n");
				printf("Enter Data: ");
				scanf("%d",&d);
				printf("Enter Position: ");
				scanf("%d",&p);
				tail = insertPos(tail, d, p); // (tail, data, position)
				break;
			case 7:
				printf("# Deleting First Node:\n");
				tail = deleteFirst(tail);
				break;
			case 8:
				printf("# Deleting Last Node:\n");
				tail = deleteLast(tail);
				break;
			/*case 9:
				printf("# Deleting Node at Certain Position:\n");
				printf("Enter Position: ");
				scanf("%d",&p);
				tail = deletePos(tail, p); // (tail, position)
				break;
			/* case 10:
				printf("# Deleting Entire Linked List:\n");
				tail = deleteLinkedList(tail);
				break;
			case 11:
				printf("# Reverse Linked List:\n");
				tail = reverseLinkedList(tail);
				break; */
			default:
				printf("Incorrect Choice!\n");
		}
	}

	return 0;
}
